<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class AdminRecipeController extends Controller
{
    //
    public function index(Request $request)
    {

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
        $recipe = Recipe::findOrFail($id);

        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
