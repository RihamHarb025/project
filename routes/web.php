<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('recipes',RecipeController::class);

Route::get('/about', function () {
    return view('recipes.about');
});
Route::get('/contact', function () {
    return view('recipes.contact');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/follow/{user}', [FollowController::class, 'toggle'])->name('follow.toggle');
Route::get('/profile/{user}/followers', [FollowController::class, 'followers'])->name('follow.followers');
Route::get('/profile/{user}/followings', [FollowController::class, 'followings'])->name('follow.followings');
Route::post('/follow/{userId}', [FollowController::class, 'toggle'])->name('follow.toggle');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
// Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::middleware(['auth'])->group(function () {
    Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipes.like');
});


require __DIR__.'/auth.php';
