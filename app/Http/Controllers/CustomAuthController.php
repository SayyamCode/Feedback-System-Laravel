<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    // **********************************************************************************

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    // **********************************************************************************


    public function registration()
    {
        return view('auth.register');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5012'
        ]);

        // Upload profile image to public folder
        $imagePath = $request->file('profile_image')->getClientOriginalName(); // Get the original filename
        $request->file('profile_image')->move(public_path('profile_images'), $imagePath); // Move the uploaded file to public/profile_images directory



        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_image' => $imagePath,
        ]);
        // Log in the user
        Auth::login($user);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    // **********************************************************************************


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    // **********************************************************************************

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
