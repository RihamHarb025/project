<?php

namespace App\Http\Controllers;
use App\Models\User; 

use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function followers($id)
    {
        // Retrieve user and their followers
        $user = User::findOrFail($id);
        $followers = $user->followers; // Get the followers of the user
        return view('profile.followers', compact('user', 'followers'));
    }

    public function followings($id)
    {
        // Retrieve user and their followings
        $user = User::findOrFail($id);
        $followings = $user->following; // Get the following of the user
        return view('profile.following', compact('user', 'followings'));
    }
    public function showProfile()
{
    $user = Auth::user()->load('followers', 'followings'); // Eager load the followers and following relationships
    return view('profile.show', compact('user'));
}


    public function toggle(User $user)
{
    if (Auth::user()->isFollowing($user)) {
        Auth::user()->following()->detach($user->id);
    } else {
        Auth::user()->following()->attach($user->id);
    }

    return back();
}
}
