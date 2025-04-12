@extends('layouts.main')

@section('content')

<div class="container mx-auto px-6 py-8"> <!-- Added padding to the container -->
    <div class="search-bar">
        <input type="text" id="userSearch" placeholder="Search users by name..." class="w-full px-6 py-3 border rounded-xl"> <!-- Increased padding for input -->
    </div>

    <div id="searchResults" class="mt-6"> <!-- Increased margin-top for results -->
        @include('users.partials.search_results', ['users' => $users])
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#userSearch').on('input', function () {
            var searchQuery = $(this).val();

            $.ajax({
                url: "{{ route('users.index') }}",
                method: "GET",
                data: { search: searchQuery },
                success: function (response) {
                    $('#searchResults').html(response);
                }
            });
        });
    });
</script>

@endsection
