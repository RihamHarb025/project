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
   
    $user = User::findOrFail($userId);
    $currentUser = Auth::user();

    // Check if the current user is already following the user
    if ($currentUser->isFollowing($user)) {
        // Unfollow
        $currentUser->following()->detach($user);
        // Decrease the follower count for the user being followed
        $user->decrement('followers_count');
    } else {
        // Follow
        $currentUser->following()->attach($user);
        // Increase the follower count for the user being followed
        $user->increment('followers_count');
    }

    return back();
}
}
