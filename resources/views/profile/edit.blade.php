@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-xl">
    <div class="flex items-center gap-6">
        <img src="{{ Auth::user()->profile_picture ?? asset('imgs/default-avatar.png') }}" 
             class="w-24 h-24 rounded-full border-4 border-green-500 shadow-md" 
             alt="Profile Picture">

        <div>
            <h2 class="text-3xl font-bold text-green-900">{{ Auth::user()->name }}</h2>
            <p class="text-gray-700">{{ Auth::user()->bio ?? 'No bio available' }}</p>

            <!-- Followers Count and Link -->
            <p class="mt-2 text-gray-600">
                <strong>Followers:</strong> 
                <a href="{{ route('follow.followers', Auth::user()->id) }}" class="text-green-600">
                    {{ $user->followers->count() ?: 0 }} 
                </a>
            </p>

            <!-- Following Count and Link -->
            <p class="mt-2 text-gray-600">
                <strong>Following:</strong> 
                <a href="{{ route('follow.followings', Auth::user()->id) }}" class="text-green-600">
                    {{ $user->following->count() ?: 0 }} 
                </a>
            </p>

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
            <h3 class="text-2xl font-semibold text-green-800 mb-4">Update Profile Information</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-semibold text-green-800 mb-4">Update Password</h3>
            @include('profile.partials.update-password-form')
        </div>
        

        <div class="p-6 bg-red-100 shadow-md rounded-lg">
            <h3 class="text-2xl font-semibold text-red-800 mb-4">Delete Account</h3>
            @include('profile.partials.delete-user-form')
        </div>

        <!-- User Recipes -->
        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-semibold text-green-800 mb-4">Your Recipes</h3>

            @if($recipes && $recipes->count() > 0)
                <ul class="space-y-4">
                @foreach($recipes as $recipe)
                        <li class="flex justify-between items-center p-4 border border-gray-300 rounded-lg bg-white shadow">
                            <span class="text-lg font-medium">{{ $recipe->title }}</span>

                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-500 px-3 py-1 rounded-md">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No Recipes! Come Add!</p>
            @endif
        </div>
    </div>
</section>
@endsection
