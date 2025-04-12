@extends('layouts.main')
@section('content')

<div class="search-bar">
    <input type="text" id="userSearch" placeholder="Search users by name..." class="w-full px-4 py-3 border rounded-xl">
</div>

<div id="searchResults" class="mt-4">
    @include('users.partials.search_results', ['users' => $users])
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
