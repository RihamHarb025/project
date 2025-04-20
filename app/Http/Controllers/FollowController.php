<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function followers($id)
    {
        $user = User::findOrFail($id);
        $followers = $user->followers;
        return view('profile.followers', compact('user', 'followers'));
    }

    public function followings($id)
    {
        $user = User::findOrFail($id);
        $followings = $user->following;
        return view('profile.following', compact('user', 'followings'));
    }
    public function showProfile()
{
    $user = Auth::user()->load('followers', 'followings'); 
    return view('users.show', compact('user'));
}


    public function toggle(User $user)
{
   
    $currentUser = Auth::user();
    if ($currentUser->isFollowing($user)) {
        $currentUser->following()->detach($user);

        $user->decrement('followers_count');
    } else {

        $currentUser->following()->attach($user);
      
        $user->increment('followers_count');
    }

    return back();
}
}
