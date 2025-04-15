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

        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name'=>$googleUser->name,
                'email'=>$googleUser->email,
                'password' => Hash::make(Str::random(24)),
            ]
            );
            Auth::login($user);

            return redirect('dashboard');
    }
}
