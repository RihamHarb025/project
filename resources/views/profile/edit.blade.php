@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-xl">
    <div class="flex items-center gap-6">
        <img src="{{ Auth::user()->profile_picture ?? asset('imgs/defaultprofile.png') }}" 
             class="w-24 h-24 rounded-full border-4 border-green-900 shadow-md" 
             alt="Profile Picture">

        <div>
            <h2 class="text-3xl font-bold text-green-900">{{ Auth::user()->name }}</h2>
            <p class="text-gray-700">{{ Auth::user()->bio ?? 'No bio available' }}</p>

            <!-- Followers Count and Link -->
            <a href="{{ route('follow.followers', Auth::user()->id) }}">
                <p class="mt-2 text-gray-600 bg-orange-300 rounded-lg p-2">
                    <strong>Followers:</strong>
                    <span>
                        {{ $user->followers->count() ?: 0 }}
                    </span>
                </p>
            </a>

            <!-- Following Count and Link -->
            <a href="{{ route('follow.followings', Auth::user()->id) }}">
                <p class="mt-2 text-gray-600 bg-orange-300 rounded-lg p-2">
                    <strong>Following:</strong>
                    <span>
                        {{ $user->following->count() ?: 0 }}
                    </span>
                </p>
            </a>

            <!-- Follow/Unfollow Button -->
            @if(Auth::id() !== $user->id)
                <form action="{{ route('follow.toggle', $user->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg text-white 
                        {{ Auth::user()->isFollowing($user) ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ Auth::user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="mt-6 space-y-6">
        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-bold text-green-800 mb-4">Update Profile Information</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-bold text-green-800 mb-4">Update Password</h3>
            @include('profile.partials.update-password-form')
        </div>
        

        <div class="p-6 bg-red-100 shadow-md rounded-lg">
            <h3 class="text-2xl font-bold text-red-800 mb-4">Delete Account</h3>
            @include('profile.partials.delete-user-form')
        </div>

        <!-- User Recipes -->
        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-bold text-green-800 mb-4">Your Recipes</h3>
            @if($recipes && $recipes->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recipes as $recipe)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-36 object-cover rounded-t-lg">
            <!-- <p>{{ $recipe->image }}</p> -->
                <!-- Recipe Name -->
                <div class="p-5">
                    <span class="text-lg font-medium">{{ $recipe->title }}</span>
                </div>

                <!-- Delete Button -->
                <div class="p-5 flex items-center justify-between mt-auto">
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 px-3 py-1 rounded-md">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>


            @else
                <p class="text-gray-600">No Recipes! Share Your Delicious Creations!</p>
                <a href="{{route('recipes.create')}}">
                <button class="mt-4 bg-green-900 text-orange-300 rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">
                    Add Recipe
                </button>
                    </a>
            @endif
        </div>
    </div>
</section>
@endsection
