@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-xl">
    <div class="flex items-center gap-6">
        <img src="{{ $user->profile_picture ?? asset('imgs/defaultprofile.png') }}" 
             class="w-24 h-24 rounded-full border-4 border-green-900 shadow-md" 
             alt="Profile Picture">

        <div>
            <h2 class="text-3xl font-bold text-green-900">{{ $user->name }}</h2>
            <p class="text-gray-700">{{ $user->bio ?? 'No bio available' }}</p>
            @if($user->banned)
                <div class="mt-4 p-4 bg-red-100 text-red-700 border-l-4 border-red-500">
                    <strong>⚠️ This user is banned.</strong>
                    <p>This user is currently banned and cannot create recipes or interact in certain ways.</p>
                </div>
            @endif
            <!-- Followers Count and Link -->
            <a href="{{ route('follow.followers', $user->id) }}">
                <p class="mt-2 text-gray-600 bg-orange-300 rounded-lg p-2">
                    <strong>Followers:</strong>
                    <span>
                        {{ $user->followers->count() ?: 0 }}
                    </span>
                </p>
            </a>

            <!-- Following Count and Link -->
            <a href="{{ route('follow.followings', $user->id) }}">
                <p class="mt-2 text-gray-600 bg-orange-300 rounded-lg p-2">
                    <strong>Following:</strong>
                    <span>
                        {{ $user->following->count() ?: 0 }}
                    </span>
                </p>
            </a>

            <!-- Follow Button -->
            @if(Auth::check())
            <form action="{{ route('follow.toggle', $user->id) }}" method="POST" id="followForm">
    @csrf
    <button 
        type="submit" 
        class="bg-green-900 text-white rounded-full px-6 py-2 mt-3 hover:bg-green-950 transition duration-300">
        {{ Auth::user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
    </button>
</form>
            @else
                    <p class="mt-3 text-green-900 font-bold">
                <a href="{{ route('register') }}" class="hover:underline">
                    Register to connect with this user
                </a>
            </p>
            @endif
        </div>
    </div>

    <!-- Recipes Section -->
    <div class="mt-6 space-y-6">
        <div class="p-6 bg-white shadow-md rounded-lg">
            <h3 class="text-2xl font-bold text-green-800 mb-4">Recipes</h3>
            @if($recipes && $recipes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recipes as $recipe)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-36 object-cover rounded-t-lg">
                            <div class="p-5 flex flex-col justify-between flex-grow">
                                <span class="text-lg font-medium">{{ $recipe->title }}</span>

                                <!-- View Recipe Button inside the card -->
                                <a href="{{ route('recipes.show', $recipe->id) }}">
                                    <button class="bg-green-900 text-white rounded-full px-6 py-2 mt-3 hover:bg-green-950 transition duration-300">
                                        View Recipe
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No Recipes to Show!</p>
            @endif
        </div>
    </div>
</section>

<!-- Modal for unregistered users -->
@if(!Auth::check())
    <div id="loginModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-bold text-green-900">You need to register!</h2>
            <p class="text-gray-700 mb-4">Sign up or log in to follow this user.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('register') }}">
                    <button class="bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">
                        Register
                    </button>
                </a>
                <a href="{{ route('login') }}">
                    <button class="border-2 border-green-900 text-green-900 rounded-full px-6 py-2 hover:bg-green-900 hover:text-white transition duration-300">
                        Login
                    </button>
                </a>
            </div>
            <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-full">Close</button>
        </div>
    </div>
@endif

<script>
    $(document).ready(function () {
        // Show modal if user is not logged in when clicking follow button
        $('#followBtn').click(function () {
            @if (!Auth::check())
                $('#loginModal').removeClass('hidden');  // Show modal if not logged in
            @endif
        });

        // Close the modal
        $('#closeModal').click(function () {
            $('#loginModal').addClass('hidden');  // Hide modal
        });
    });
</script>
@endsection
