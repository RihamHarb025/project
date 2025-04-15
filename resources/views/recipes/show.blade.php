@extends('layouts.main')

@section('content')
<body>
    <div class="container mt-5">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

            <!-- Recipe Image -->
            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-72 object-cover rounded-t-lg">

            <!-- Card Body -->
            <div class="p-6">
                <!-- Recipe Title -->
                <h1 class="text-3xl font-semibold text-gray-900 mb-4">{{ $recipe->title }}</h1>

                <!-- Like Button -->
                <div class="mb-4">
                    @auth
                        <form action="{{ route('recipes.like', $recipe->id) }}" method="POST" class="mb-4" id="like-form">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 bg-pink-100 text-pink-700 px-4 py-2 rounded-full hover:bg-pink-200 transition" id="like-btn">
                                @if ($recipe->isLikedBy(auth()->user())) 
                                <i class="fa-solid fa-heart"></i> Liked 
                                @else 
                                <i class="fa-regular fa-heart"></i> Like
                                @endif
                                (<span id="like-count">{{ $recipe->likes->count() }}</span>)
                            </button>
                        </form>
                    @else
                        <button class="flex items-center gap-2 bg-gray-200 text-gray-500 px-4 py-2 rounded-full cursor-not-allowed" disabled>
                        <i class="fa-regular fa-heart"></i> Like ({{ $recipe->likes->count() }})
                        </button>
                        <p class="mt-3 text-green-900 font-bold">
                            <a href="{{ route('register') }}" class="hover:underline">Register to interact with your favorite recipes</a>
                        </p>
                    @endauth
                </div>

                <!-- Recipe Description -->
                <p class="text-lg text-gray-600 mb-4">{{ $recipe->description }}</p>

                <!-- Additional Attributes -->
                <ul class="mb-4">
                    <li class="text-gray-800"><strong>Category:</strong> {{ $recipe->categories->pluck('name')->join(', ') }}</li>
                    <li class="text-gray-800"><strong>Created At:</strong> {{ $recipe->created_at->format('M d, Y') }}</li>
                </ul>

                <!-- Tags -->
                <h5 class="text-xl font-semibold text-gray-800 mb-3">Tags:</h5>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($recipe->tags as $tag)
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <!-- Back Button -->
                <a href="{{ route('recipes.index') }}" 
                   class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-6 inline-block">
                    Back to Recipes
                </a>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="max-w-4xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
            <h4 class="text-2xl font-semibold mb-6 text-gray-800">Comments</h4>

            <!-- Comment Form -->
            @auth
                <form id="comment-form" action="{{ route('comments.store', $recipe->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <textarea name="body" required rows="4" class="w-full p-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800" placeholder="Write your comment..."></textarea>
                    <button type="submit" class="w-full bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">Submit Comment</button>
                </form>
            @else
                <p class="text-gray-600 mb-4">You must be <a href="{{ route('login') }}" class="text-green-800 font-semibold hover:underline">logged in</a> to comment.</p>
            @endauth

            <!-- Comments List -->
            <div id="comments-section">
                @foreach ($recipe->comments as $comment)
                    <div class="mb-6 mt-6 border-b pb-4">
                        <div class="flex items-center justify-between space-x-4">
                            <div class="flex items-center space-x-2">
                                <img src="{{ $comment->user->profile_picture }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full object-cover">
                                <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                            </div>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-2 text-gray-700">{{ $comment->body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
@endsection
