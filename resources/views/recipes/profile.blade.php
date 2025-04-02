@extends('layouts.main')
@section('content')

<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-xl">
    <div class="flex items-center gap-6">
        <img src="{{ $user->image-profile ?? asset('imgs/default-avatar.png') }}" 
             class="w-24 h-24 rounded-full border-4 border-green-500 shadow-md" 
             alt="Profile Picture">

        <div>
            <h2 class="text-3xl font-bold text-green-900">{{ $user->name }}</h2>
            <p class="text-gray-700">{{ $user->bio ?? 'No bio available' }}</p>

            <a href="{{ route('profile.edit') }}" 
               class="mt-2 inline-block px-4 py-2 bg-green-700 text-white rounded-lg shadow hover:bg-green-900">
               Edit Profile
            </a>
        </div>
    </div>

    <div class="mt-6">
        <h3 class="text-2xl font-semibold text-green-800">Your Recipes</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            @foreach($user->recipes as $recipe)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset($recipe->image) }}" class="w-full h-40 object-cover rounded-lg">
                    <h4 class="mt-2 font-semibold text-lg">{{ $recipe->title }}</h4>
                    <a href="{{ route('recipes.show', $recipe->id) }}" 
                       class="text-green-600 hover:underline">View Recipe</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
