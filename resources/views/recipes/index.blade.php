@extends('layouts.main')
@section('content')

<body>
    <div class="container mt-5">
        <!-- Search Input -->
        <form id="searchForm" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by recipe name..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Recipe Cards -->
        <div id="recipeContainer" class="row">
            @include('recipes._recipe_cards', ['recipes' => $recipes])
        </div>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AJAX Search Script -->
    <script>
        $(document).ready(function () {
            $('#searchForm').on('submit', function (e) {
                e.preventDefault();

                const searchTerm = $('#searchInput').val();

                // Send an AJAX request
                $.ajax({
                    url: "{{ route('recipes.index') }}",
                    type: "GET",
                    data: { search: searchTerm },
                    success: function (response) {
                        // Update the recipe container with the new data
                        $('#recipeContainer').html(response);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            let timer;
        $('#searchInput').on('keyup', function () {
            clearTimeout(timer); // Clear the previous timer
            timer = setTimeout(function () {
                $('#searchForm').submit(); // Submit the form after 300ms
            }, 100); 
        });
    });
</script>
</body>

@endsection