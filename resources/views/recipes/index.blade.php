@extends('layouts.main')
@section('content')

<body>
<div class="flex flex-col lg:flex-row justify-between mt-5 gap-6">
    <!-- Filters Sidebar -->
    <div class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Filters</h3>
        
        <form id="filter-form" class="flex flex-col space-y-4 mb-6">
            <select name="date_order" id="date_order" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-300 ease-in-out">
                <option value="">Sort by Date</option>
                <option value="desc" {{ request('date_order') == 'desc' ? 'selected' : '' }}>Most Recent</option>
                <option value="asc" {{ request('date_order') == 'asc' ? 'selected' : '' }}>Oldest First</option>
            </select>

            <select name="name_order" id="name_order" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-300 ease-in-out">
                <option value="">Sort by Name</option>
                <option value="asc" {{ request('name_order') == 'asc' ? 'selected' : '' }}>A to Z</option>
                <option value="desc" {{ request('name_order') == 'desc' ? 'selected' : '' }}>Z to A</option>
            </select>

            <br>
            <div class="mt-6">
                <p class="text-lg font-semibold text-gray-800 mb-2">Select Tags</p>
                <div class="max-h-60 overflow-y-auto space-y-2">
                    @foreach($tags as $tag)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}" 
                                {{ in_array($tag->id, request('tags', [])) ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-green-600 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600">
                            <label for="tag_{{ $tag->id }}" class="text-gray-700">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <div class="w-full lg:w-3/4 mt-5">
        <form id="searchForm" class="mb-6 w-full bg-white p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <div class="relative">
                    <input type="text" name="search" id="searchInput"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 bg-gray-100 text-gray-800 placeholder-gray-500 transition duration-300 ease-in-out"
                        placeholder="Search by recipe name..." value="{{request('search')}}">
                    <span class="absolute inset-y-0 right-4 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 18a7 7 0 100-14 7 7 0 000 14zm0 0l6 6"></path>
                        </svg>
                    </span>
                </div>

                <select name="category" id="category"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-300 ease-in-out">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <div id="recipeContainer" class="row mt-10">
            @include('recipes._recipe_cards', ['recipes' => $recipes])
        </div>
    </div>
</div>

<script>
 $(document).ready(function () {
    $('#filter-form select, #searchInput, #category, input[name="tags[]"]').on('change keyup', function () {
        $('#filter-form').submit();
    });

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();

        var nameOrder = $('#name_order').val();
        var dateOrder = $('#date_order').val();
        var search = $('#searchInput').val();
        var category = $('#category').val();

        var tags = [];
        $('input[name="tags[]"]:checked').each(function() {
            tags.push($(this).val());
        });

        $.ajax({
            url: '{{ route('recipes.index') }}',
            method: 'GET',
            data: {
                search: search,
                category: category,
                tags: tags,
                name_order: nameOrder,
                date_order: dateOrder
            },
            success: function (response) {
                $('#recipeContainer').html(response);
            },
            error: function () {
                console.error('Something went wrong with the filter AJAX request.');
            }
        });
    });
});
</script>

</body>
@endsection
