<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like(Recipe $recipe)
{
    $user = auth()->user();  // Get the currently authenticated user

    // Check if the user has already liked this recipe
    $alreadyLiked = $recipe->likes()->where('user_id', $user->id)->exists();

    if ($alreadyLiked) {
        // If already liked, unlike (detach)
        $recipe->likes()->detach($user->id);
    } else {
        // Otherwise, like the recipe (attach)
        $recipe->likes()->attach($user->id);
    }

    return back();  // Go back to the previous page (recipe page)
}

}
