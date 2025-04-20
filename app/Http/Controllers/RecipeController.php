<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;




class RecipeController extends Controller
{

    public function index(Request $request)
    {
    
        $search = $request->input('search');
        $category = $request->input('category');
        $tags = $request->input('tags', []);  // Default to an empty array if no tags are selected
        $name_order = $request->input('name_order'); // 'asc' or 'desc' (A-Z or Z-A)
        $date_order = $request->input('date_order'); // 'asc' or 'desc' (Oldest or Newest)
        \Log::info('Search:', [$search]);
        \Log::info('Category:', [$category]);
        \Log::info('Tags:', [$tags]);
        // Start the query for recipes
        $recipes = Recipe::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->when($category, function ($query, $category) {
            return $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category);
            });
        })
        // Adjusted filter for tags
        ->when(count($tags), function ($query) use ($tags) {
            return $query->whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('tags.id', $tags);
            });
        })
        // Apply name order if selected
        ->when($name_order, function ($query, $name_order) {
            return $query->orderBy('title', $name_order);
        })
        // Apply date order if selected (and name_order not present)
        ->when(!$name_order && $date_order, function ($query) use ($date_order) {
            return $query->orderBy('created_at', $date_order);
        })
        ->get();
    
        // Get categories and tags for the view
        $categories = Category::all();
        $tags = Tag::all();
    
        // Log the tags for debugging purposes
        // \Log::info('Selected Tags:', $tags);
    
        // If it's an AJAX request, return the filtered recipe cards
        if ($request->ajax()) {
            return view('recipes._recipe_cards', compact('recipes'))->render();
        }
    
        // Return the full view
        return view('recipes.index', compact(
            'recipes', 'search', 'categories', 'tags', 
            'category', 'tags', 'name_order', 'date_order'
        ));
    }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            if (auth()->check() && auth()->user()->banned) {
                return redirect()->back()->with('banned_warning', 'You are currently banned from creating recipes.');
            }
            $categories = Category::all();
            $tags = Tag::all(); 
        
            return view('recipes.create', compact('categories', 'tags'));
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            
            if (auth()->user()->is_banned) {
                return redirect()->route('users.show', ['user' => auth()->id()])
                                 ->with('error', 'You are banned and cannot create recipes.');
            }
    
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'array',
                'tags.*' => 'exists:tags,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ]);
           
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                 //dd($image->move(public_path('imgs'), $imageName)); 
            
                 $imagePath = $image->store('imgs', 'public');
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
        
            $recipe->categories()->attach($request->category_id);
    
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
            $recipe = Recipe::findOrFail($id);
            $user = Auth::user();
        
            // Let the user delete if they are the owner OR admin
            if ($user->id === $recipe->user_id || $user->is_admin) {
                $recipe->delete();
        
                // Redirect based on role
                if ($user->is_admin) {
                    return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
                } else {
                    return redirect()->route('profile.edit')->with('success', 'Recipe deleted successfully');
                }
            }
        
            return redirect()->route('profile.edit')->with('error', 'Unauthorized');
    }
    
}
