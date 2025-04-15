<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like(Recipe $recipe)
{

    if (auth()->user()->banned) {
        return redirect()->back()->with('error', 'Your account is banned. You cannot like a recipe.');
    }
    
    $user = auth()->user(); 
    $alreadyLiked = $recipe->likes()->where('user_id', $user->id)->exists();

    if ($alreadyLiked) {
        $recipe->likes()->detach($user->id);
    } else {
        $recipe->likes()->attach($user->id);
    }

    return back(); 
}

}
