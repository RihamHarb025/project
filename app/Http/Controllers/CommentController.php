<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, $recipeId)
    {
        if (auth()->user()->banned) {
            return response()->json([
                'error' => 'Your account is banned. You cannot comment.',
            ], 403); // 403 Forbidden status code
        }

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
    public function update(Request $request, $recipeId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (auth()->id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update([
            'body' => $request->body,
        ]);

        return response()->json(['success' => true, 'updated_body' => $comment->body]);
    }
    public function destroy($recipeId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (auth()->id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully!']);
    }
}
