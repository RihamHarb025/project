@extends('layouts.main')
@section('content')

<body>
    <div class="container mt-5">
       
        <form id="searchForm" class="mb-6 w-full bg-white p-6 rounded-lg shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
        <div class="relative">
            <input type="text" name="search" id="searchInput"
                   class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   placeholder="Search by recipe name..." value="{{ $search }}">
            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                🔍
            </span>
        </div>
        <select name="category" id="category"
                class="form-select w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <select name="tag" id="tag"
                class="form-select w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
            <option value="">Select Tag</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="flex justify-center mt-4">
        <button type="submit"
                class="bg-green-900 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-950 transition duration-300">
            Search
        </button>
    </div>
</form>
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
        });
</script>
</body>

@endsection