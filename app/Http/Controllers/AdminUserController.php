<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactMessage;
use App\Models\Recipe;
use App\Models\Comment;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

    $users = User::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    })->paginate(10); // or use ->get() if not paginated
    
    if ($request->ajax()) {
        return view('admin.partials.users-table', compact('users'))->render();
    }
    
        return view('admin.index', [
            'users' => $users,
            'search' => $search,
            'totalUsers' => User::count(),
            'totalRecipes' => Recipe::count(),
            'mostLikedRecipe' => Recipe::withCount('likes')->orderByDesc('likes_count')->first(),
            'messages' => ContactMessage::latest()->get(),
            'recentRecipes' => Recipe::with('user')->latest()->take(3)->get(),
            'recentUsers' => User::latest()->take(3)->get(),
            'recentComments' => Comment::with(['user', 'recipe'])->latest()->take(3)->get()
        ]);


    }
    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->banned = true; // Assuming you have an `is_banned` column
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User banned successfully');
    }

    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->banned = false;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User unbanned successfully');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
