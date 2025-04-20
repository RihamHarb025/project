<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSetupController extends Controller
{
    //class ProfileSetupController extends Controller

    public function index()
    {
        return view('profile.setup'); 
    }

}
