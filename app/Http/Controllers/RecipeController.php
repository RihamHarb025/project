<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

    $recipes = Recipe::when($search, function ($query, $search) {
        return $query->where('title', 'like', '%' . $search . '%');
    })->get();

    if ($request->ajax()) {
        return view('recipes._recipe_cards', compact('recipes'))->render();
    }

    return view('recipes.index', compact('recipes', 'search'));
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
         // Find the recipe by ID
        //  $recipe = Recipe::findOrFail($id);

        //  // Pass the recipe to the view
        //  return view('recipes.show', compact('recipe'));
        $recipe = Recipe::with(['categories', 'tags'])->findOrFail($id);

        // Return the view and pass the recipe data
        return view('recipes.show', compact('recipe'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
