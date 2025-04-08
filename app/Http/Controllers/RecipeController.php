<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    $category = $request->input('category');
    $tag = $request->input('tag');

    $recipes = Recipe::when($search, function ($query, $search) {
        return $query->where('title', 'like', '%' . $search . '%');
    })
    ->when($category, function ($query, $category) {
        return $query->whereHas('categories', function($q) use ($category) {
            $q->where('categories.id', $category);
        });
    })
    ->when($tag, function ($query, $tag) {
        return $query->whereHas('tags', function($q) use ($tag) {
            $q->where('tags.id', $tag);
        });
    })
    ->get();
    $categories = Category::all();
    $tags = Tag::all();


    if ($request->ajax()) {
        return view('recipes._recipe_cards', compact('recipes'))->render();
    }

    return view('recipes.index', compact('recipes', 'search', 'categories', 'tags', 'category', 'tag'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all(); 
    
        return view('recipes.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imgs'), $imageName);
            $imagePath = 'imgs/' . $imageName;
        } else {
            $imagePath = null;
        }
       
        $recipe = Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id, 
            'image' => $imagePath,
            'user_id' => auth()->id(), 
        ]);
    
        if ($request->tags) {
            $recipe->tags()->attach($request->tags);
        }
    
        
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $recipe = Recipe::with(['categories', 'tags','comments.user'])->findOrFail($id);

        return view('recipes.show', compact('recipe'));
    }

    public function like(Recipe $recipe)
    {
        $user = auth()->user();
    
        if ($recipe->likes()->where('user_id', $user->id)->exists()) {
            $recipe->likes()->detach($user->id);
            $liked = false;
        } else {
            $recipe->likes()->attach($user->id);
            $liked = true;
        }
    
        return response()->json([
            'liked' => $liked,
            'like_count' => $recipe->likes->count(),
        ]);
    }
    public function edit(string $id)
    {
        //
        $recipe = Recipe::findOrFail($id);

        if(auth()->user()->is_admin || auth()->user()->id === $recipe->user_id) {
            return view('recipes.edit', compact('recipe'));
        }

        return redirect()->route('recipes.index')->with('error', 'Unauthorized');
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $recipe = Recipe::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recipe = Recipe::findOrFail($id);
    if (Auth::user()->is_admin) {
        $recipe->delete();
        return response()->json(['message' => 'Recipe deleted successfully']);
    }

    return response()->json(['error' => 'Unauthorized'], 403);
    }
}
