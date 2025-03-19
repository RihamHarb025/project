<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('recipes',RecipeController::class);


Route::get('/contact', function () {
    return view('recipes.contact');
});
Route::get('/login', function () {
    return view('recipes.login');
});
Route::get('/signup', function () {
    return view('recipes.signup');
});

