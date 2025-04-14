<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $users = User::when($search, function ($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('username', 'like', '%' . $search . '%');
            });
        })
        ->get(); // Fetch the results, even if search is empty
    
        if ($request->ajax()) {
            return view('users.partials.search_results', compact('users'))->render(); // return just the list for AJAX
        }
    
        return view('users.index', compact('users', 'search')); // full page if not AJAX
    }

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
    public function show(User $user)
    {
        //
        $recipes = $user->recipes;  // Assuming you have the 'recipes' relationship defined in the User model

    return view('users.show', compact('user', 'recipes'));
    }
    
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
    public function destroy(User $user)
    {
        //
        if (auth()->user()->is_admin) {
            // Delete the user
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User banned successfully.');
        }
    
        // If the user is not authorized (not admin)
        return redirect()->route('users.index')->with('error', 'Unauthorized action.');
    }
}
