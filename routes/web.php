
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [ReviewController::class, 'dashboard'])->name('dashboard');


    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

    Route::get('add-review', [ReviewController::class, 'index'])->name('add.review');

    Route::post('review-store', [ReviewController::class, 'store'])->name('review-store');


    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// ******************** GUEST AUTH **************************************************

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');


Route::get('register', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
