<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminUserController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('recipes',RecipeController::class);

Route::get('/aboutUs', function () {
    return view('aboutUs'); 
})->name('aboutUs');

Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');


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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::post('/follow/{user}', [FollowController::class, 'toggle'])->name('follow.toggle');
Route::get('/profile/{user}/followers', [FollowController::class, 'followers'])->name('follow.followers');
Route::get('/profile/{user}/followings', [FollowController::class, 'followings'])->name('follow.followings');
Route::post('/follow/{userId}', [FollowController::class, 'toggle'])->name('follow.toggle');
// Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
// Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');



Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::middleware(['auth'])->group(function () {
    // This will apply auth middleware for creating a recipe
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipes.like');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('/admin', AdminController::class);
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->except(['index', 'show']); // Exclude the routes that don't need auth
});
Route::middleware(['auth'])->group(function () {
    Route::post('/users/{id}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::post('/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.index');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/users/{id}/ban', [AdminUserController::class, 'ban'])->name('admin.users.ban');
    Route::post('/admin/users/{id}/unban', [AdminUserController::class, 'unban'])->name('admin.users.unban');
});

require __DIR__.'/auth.php';
