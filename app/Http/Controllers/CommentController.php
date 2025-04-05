<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);
    
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'recipe_id' => $recipeId,
            'body' => $request->body,
        ]);
    
        return response()->json([
            'comment' => [
                'user_name' => $comment->user->name,
                'body' => $comment->body,
                'created_at' => $comment->created_at->diffForHumans(),
            ]
        ]);
    }

}
