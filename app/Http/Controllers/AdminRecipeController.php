<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRecipeController extends Controller
{
    //
    public function index(Request $request)
    {
        // If there is a search query, filter by title or category, else show all recipes
        $search = $request->get('search');

        $recipes = Recipe::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhereHas('categories', function ($query) use ($search) {
                             $query->where('name', 'like', "%{$search}%");
                         });
        })->get();

        return view('admin.recipes.index', compact('recipes', 'search'));
    }
    public function destroy($id)
    {
        // Find the recipe by its ID
        $recipe = Recipe::findOrFail($id);

        // Delete the recipe
        $recipe->delete();

        // Redirect back with a success message
        return redirect()->route('admin.recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
