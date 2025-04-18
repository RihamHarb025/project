@extends('layouts.main')

@section('content')
<body>
    <div class="container mt-5">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

            <!-- Recipe Image -->
            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-72 object-cover rounded-t-lg">

            <!-- Card Body -->
            <div class="p-6">
                <h1 class="text-3xl font-semibold text-gray-900 mb-4">{{ $recipe->title }}</h1>

                <!-- Like Button -->
                <div class="mb-4">
                    @auth
                        <form action="{{ route('recipes.like', $recipe->id) }}" method="POST" id="like-form" class="mb-4">
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

                <p class="text-lg text-gray-600 mb-4">{{ $recipe->description }}</p>

                <ul class="mb-4">
                    <li class="text-gray-800"><strong>Category:</strong> {{ $recipe->categories->pluck('name')->join(', ') }}</li>
                    <li class="text-gray-800"><strong>Created At:</strong> {{ $recipe->created_at->format('M d, Y') }}</li>
                </ul>

                <h5 class="text-xl font-semibold text-gray-800 mb-3">Tags:</h5>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($recipe->tags as $tag)
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <a href="{{ route('recipes.index') }}" class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-6 inline-block">
                    Back to Recipes
                </a>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="max-w-4xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
            <h4 class="text-2xl font-semibold mb-6 text-gray-800">Comments</h4>

            @auth
                <form id="comment-form" action="{{ route('comments.store', $recipe->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <textarea name="body" required rows="4" class="w-full p-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800" placeholder="Write your comment..."></textarea>
                    <button type="submit" class="w-full bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300 mb-5">Submit Comment</button>
                </form>
            @else
                <p class="text-gray-600 mb-4">You must be <a href="{{ route('login') }}" class="text-green-800 font-semibold hover:underline">logged in</a> to comment.</p>
            @endauth

            <div id="comments-section">
    @foreach ($recipe->comments as $comment)
        <div class="mb-4 p-3 bg-gray-100 rounded relative comment" id="comment-{{ $comment->id }}" data-id="{{ $comment->id }}">
            <p class="text-sm text-gray-800 comment-body" id="comment-body-{{ $comment->id }}">{{ $comment->body }}</p>
            <p class="text-xs text-gray-500">{{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}</p>

            @auth
                @if(auth()->id() === $comment->user_id)
                    <div class="absolute top-2 right-2 flex gap-2">
                        <button class="text-gray-500 text-sm edit-btn" data-id="{{ $comment->id }}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="text-red-500 text-sm delete-btn" data-id="{{ $comment->id }}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>

                    <form class="mt-2 hidden edit-comment-form" id="edit-form-{{ $comment->id }}" data-id="{{ $comment->id }}">
    @csrf
    <textarea id="edit-body-{{ $comment->id }}" class="w-full p-2 border rounded">{{ $comment->body }}</textarea>
    <button type="submit" class="mt-1 px-3 py-1 bg-green-600 text-white rounded">Update</button>
</form>
                @endif
            @endauth
        </div>
    @endforeach
</div>
        </div>
    </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
  $(document).ready(function () {

// Show edit form
$('.edit-btn').on('click', function () {
        const id = $(this).data('id');
        $(`#comment-body-${id}`).hide();
        $(`#edit-form-${id}`).show();
    });

    // Submit updated comment when the form is submitted
    $('.edit-comment-form').on('submit', function (e) {
        e.preventDefault();
        
        const commentId = $(this).data('id'); // Get the comment ID from the form's data-id
        const newBody = $(`#edit-body-${commentId}`).val();

        // Make AJAX request to update the comment
        $.ajax({
            url: `/recipes/{{ $recipe->id }}/comments/${commentId}`, // Correct URL with dynamic recipe ID
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                body: newBody
            },
            success: function (response) {
                // Update the comment text with the new body
                $(`#comment-body-${commentId}`).text(newBody).show();
                $(`#edit-form-${commentId}`).hide();
            },
            error: function (xhr) {
                alert('Something went wrong while updating 😢');
                console.error(xhr.responseText); // Log the error for debugging
            }
        });
    });

    
// Delete comment
$('.delete-btn').on('click', function () {
    const commentId = $(this).data('id');
    if (!confirm('Are you sure you want to delete this comment?')) return;

    $.ajax({
        url: `/recipes/${commentId}/comments/${commentId}`,
        type: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function () {
            $(`#comment-${commentId}`).remove();
        },
        error: function () {
            alert('Failed to delete comment 🥲');
        }
    });
});
});
</script>

@endsection
