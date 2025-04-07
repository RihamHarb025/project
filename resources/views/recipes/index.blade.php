@extends('layouts.main')
@section('content')

<body>
<div class="container mt-5">
    <form id="searchForm" class="mb-6 w-full bg-white p-6 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            <!-- Search Input -->
            <div class="relative">
                <input type="text" name="search" id="searchInput"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 bg-gray-100 text-gray-800 placeholder-gray-500 transition duration-300 ease-in-out"
                       placeholder="Search by recipe name..." value="{{ $search }}">
                <span class="absolute inset-y-0 right-4 flex items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 18a7 7 0 100-14 7 7 0 000 14zm0 0l6 6"></path>
                    </svg>
                </span>
            </div>

            <!-- Category Dropdown -->
            <select name="category" id="category"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-300 ease-in-out">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <!-- Tag Dropdown -->
            <select name="tag" id="tag"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-300 ease-in-out">
                <option value="">Select Tag</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit"
                    class="bg-green-900 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-green-950 transition duration-300 ease-in-out transform hover:scale-105">
                Search
            </button>
        </div>
    </form>

    <!-- Recipe Container -->
    <div id="recipeContainer" class="row">
        @include('recipes._recipe_cards', ['recipes' => $recipes])
    </div>
</div>

    <!-- AJAX Search Script -->
    <script>
       $(document).ready(function () {
            function fetchRecipes() {
                var search = $('#searchInput').val();
                var category = $('#category').val();
                var tag = $('#tag').val();

                $.ajax({
                    url: "{{ route('recipes.index') }}",
                    method: "GET",
                    data: {
                        search: search,
                        category: category,
                        tag: tag
                    },
                    success: function (response) {
                        $('#recipeContainer').html(response);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            $('#searchInput').on('input', function () {
                fetchRecipes();
            });

            $('#category').on('change', function () {
                fetchRecipes();
            });

            $('#tag').on('change', function () {
                fetchRecipes();
            });
            $('.delete-button').on('click', function() {
        var recipeId = $(this).data('recipe-id');

        if (confirm('Are you sure you want to delete this recipe?')) {
            // Send a request to delete the recipe
            $.ajax({
                url: '/recipes/' + recipeId,  // Assuming you're using a resource controller
                method: 'DELETE',
                success: function(response) {
                    alert('Recipe deleted!');
                    // You can also remove the recipe from the DOM after successful delete
                    $(this).closest('.recipe-card').remove();
                },
                error: function(xhr, status, error) {
                    alert('Error deleting recipe');
                }
            });
        }
    });

    $('.edit-button').click(function() {
        var recipeId = $(this).data('recipe-id');
        
        // Toggle visibility of title and description inputs
        $('#recipe-title-' + recipeId).toggleClass('hidden');
        $('#recipe-description-' + recipeId).toggleClass('hidden');
        $('#edit-title-' + recipeId).toggleClass('hidden');
        $('#edit-description-' + recipeId).toggleClass('hidden');
        
        // Toggle Edit/Save Button text
        if ($(this).text() == 'Edit') {
            $(this).text('Save');
        } else {
            // On Save, you can perform the saving action (e.g., AJAX call to save changes)
            var newTitle = $('#edit-title-' + recipeId).val();
            var newDescription = $('#edit-description-' + recipeId).val();

            // Example: Saving the new title and description via AJAX (you can customize this)
            $.ajax({
                url: '/recipes/' + recipeId,  // Adjust the URL for your route
                method: 'PUT',                // Use PUT or PATCH depending on your backend
                data: {
                    _token: '{{ csrf_token() }}',
                    title: newTitle,
                    description: newDescription
                },
                success: function(response) {
                    // Upon success, update the card content
                    $('#recipe-title-' + recipeId).text(newTitle);
                    $('#recipe-description-' + recipeId).text(newDescription);
                    
                    // Optionally, show a success message
                    alert('Recipe updated!');
                }
            });

            $(this).text('Edit');  // Change button back to "Edit" after saving
        }
    });
        });
</script>
</body>

@endsection