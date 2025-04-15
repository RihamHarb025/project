<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Recipe;
use App\Models\ContactMessage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::count(); // Count all registered users
        $totalRecipes = Recipe::count();
        $mostLikedRecipe = Recipe::withCount('likes')->orderByDesc('likes_count')->first();


        return view('admin.index', [
            'totalUsers' => User::count(),
            'totalRecipes' => Recipe::count(),
            'mostLikedRecipe' => Recipe::withCount('likes')->orderByDesc('likes_count')->first(),
            'users' => null,
            'search' => null,
            'messages' => ContactMessage::latest()->get()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function showMessages()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $user = Auth::user();

        // Let the admin delete the recipe
        if ($user->is_admin) {
            $recipe->delete();
            return redirect()->route('admin.index')->with('success', 'Recipe deleted successfully');
        }

        return redirect()->route('admin.index')->with('error', 'Unauthorized');

    }
}
