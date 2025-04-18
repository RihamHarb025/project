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
use App\Http\Controllers\GoogleAuthController;  // Fixed case sensitivity
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\MealPlanController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('recipes', RecipeController::class);

// Static pages
Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/contactUs', function () {
    return view('contact');
})->name('contact');

// Google Auth
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('redirect');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callback'])->name('call-back');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{id}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::post('/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');
});

// Follow routes
Route::middleware(['auth'])->group(function () {
    Route::post('/follow/{user}', [FollowController::class, 'toggle'])->name('follow.toggle');
    Route::get('/profile/{user}/followers', [FollowController::class, 'followers'])->name('follow.followers');
    Route::get('/profile/{user}/followings', [FollowController::class, 'followings'])->name('follow.followings');
});

// Comment routes
Route::middleware(['auth'])->group(function () {
    Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/recipes/{recipe}/comments', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/recipes/{recipe}/comments', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Recipe creation
Route::middleware(['auth'])->group(function () {
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipes.like');
});

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/messages', [AdminController::class, 'showMessages'])->name('admin.messages');
        Route::post('/users/{id}/ban', [AdminUserController::class, 'ban'])->name('admin.users.ban');
        Route::post('/users/{id}/unban', [AdminUserController::class, 'unban'])->name('admin.users.unban');
    });
});

// Tags and categories
Route::middleware(['auth'])->group(function () {
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

// Contact routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Premium routes
Route::middleware(['auth'])->group(function () {
    Route::get('/premium/plans', [PremiumController::class, 'showPlans'])->name('premium.plans');
    Route::get('/premium/payment/{plan}', [PremiumController::class, 'paymentPage'])->name('premium.payment');
    Route::post('/premium/subscribe', [PremiumController::class, 'subscribe'])->name('premium.subscribe'); 
    
    Route::get('/mealplan', [MealPlanController::class, 'index'])
    ->name('mealplan');
});

require __DIR__.'/auth.php';