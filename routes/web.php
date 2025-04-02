<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');


require __DIR__.'/auth.php';
