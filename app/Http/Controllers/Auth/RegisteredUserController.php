<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Tag;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $tags = Tag::all(); 
        return view('auth.register', compact('tags'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'bio' => ['nullable', 'string'],
            'image-profile' => ['nullable', 'image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'], 
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);
        // dd($request->all());
        
        $imagePath = null;
        if ($request->hasFile('image-profile')) {
            // Store image in the public disk (storage/app/public)
            $imagePath = $request->file('image-profile')->store('imgs', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'bio' => $request->bio ?? null,  // Default to null if not provided
           'image-profile' => $imagePath ?? null,
            'is_admin' => false,
        ]);
        
        if ($request->has('tags')) {
            $user->tags()->attach($request->tags); // Attach selected tags
        }


        event(new Registered($user));
        
        Auth::login($user);

        return redirect(route('profile.edit'));
    }
}
