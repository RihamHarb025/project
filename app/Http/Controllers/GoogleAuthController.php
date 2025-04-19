<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class GoogleAuthController extends Controller
{
    
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists by email
        $user = User::where('email', $googleUser->email)->first();
    
        if ($user) {
            // User exists, log them in
            Auth::login($user);
        } else {
            // User doesn't exist, create a new one
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make(Str::random(24)), // You can store random password
            ]);
            Auth::login($user);
        }
            return redirect('profile/edit');
    }
}
