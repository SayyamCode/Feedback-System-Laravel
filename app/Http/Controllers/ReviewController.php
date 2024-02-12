<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return view('add-review');
    }

    // **********************************************************************************

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'rating' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create a new instance of the Form model
        $review =  new review();

        // Assign the authenticated user's ID to user_id
        $review->user_id = Auth::id();

        // Assign other rev$review data
        $review->rating = $validatedData['rating'];
        $review->title = $validatedData['title'];
        $review->description = $validatedData['description'];

        // Save the rev$review data
        $review->save();

        // Redirect to a success page or any other action
        return redirect()->route('dashboard')->withSuccess('Review Add Successfully');
    }

    // **********************************************************************************************

    public function dashboard()
    {

        if (Auth::check()) {

            // Count total reviews
            $totalReviews = review::count();

            // Calculate overall rating
            $overallRating = review::avg('rating');

            // Count reviews for each rating
            $ratingsCount = [];
            for ($i = 5; $i >= 1; $i--) {
                $ratingsCount[$i] = review::where('rating', $i)->count();
            }

            $reviews = review::with('user')->latest()->get();

            return view('dashboard', [
                'reviews' => $reviews, 'totalReviews' => $totalReviews,
                'overallRating' => $overallRating, 'ratingsCount' => $ratingsCount
            ]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access , Please Login First');
        }
    }

    // ************************************************************************************************

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return back()->with('destroy', 'Review deleted successfully.');
    }
}
