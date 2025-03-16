<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\RecipeController;
>>>>>>> 561cf19c91a75bf4b165f9cf487c6a43841cf481

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======
Route::resource('recipes',RecipeController::class);
>>>>>>> 561cf19c91a75bf4b165f9cf487c6a43841cf481
