<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Recipe;
use App\Models\ContactMessage;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalUsers = User::count(); 
        $totalRecipes = Recipe::count();
        $mostLikedRecipe = Recipe::withCount('likes')->orderByDesc('likes_count')->first();
        $recentRecipes = Recipe::with('user')->latest()->take(3)->get();
        $recentUsers = User::latest()->take(3)->get();
        $recentComments = Comment::with(['user', 'recipe'])->latest()->take(3)->get();
        $totalPaidUsers = Payment::distinct('user_id')->count('user_id');
        $totalRevenue = Payment::sum('amount');


        $search = $request->search;

    $users = User::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    })->paginate(10);
    
    if ($request->ajax()) {
        return view('admin.partials.users-table', compact('users'))->render();
    }
        return view('admin.index', [
            'totalUsers' => $totalUsers,
            'totalRecipes' => $totalRecipes,
            'mostLikedRecipe' => $mostLikedRecipe,
            'users' => $users,
            'search' => $search,
            'messages' => ContactMessage::latest()->get(),
            'recentRecipes'=>$recentRecipes,
            'recentUsers'=> $recentUsers,
            'recentComments'=>$recentComments,
            'totalPaidUsers'=>$totalPaidUsers,
            'totalRevenue'=>$totalRevenue
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

        if ($user->is_admin) {
            $recipe->delete();
            return redirect()->route('admin.index')->with('success', 'Recipe deleted successfully');
        }

        return redirect()->route('admin.index')->with('error', 'Unauthorized');

    }
}
