<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

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
        ->get();
    
        if ($request->ajax()) {
            return view('users.partials.search_results', compact('users'))->render(); 
        }
    
        return view('users.index', compact('users', 'search')); 
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
        $recipes = $user->recipes; 

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
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User banned successfully.');
        }
    
        return redirect()->route('users.index')->with('error', 'Unauthorized action.');
    }
    public function ban($id)
{
    $user = User::findOrFail($id);

    $user->banned = true;
    $user->save();

    return redirect()->back()->with('success', 'User has been banned successfully.');
}
public function unban($id)
{
    $user = User::findOrFail($id);

    $user->banned = false;
    $user->save();

    return redirect()->back()->with('success', 'User has been unbanned.');
}
}
