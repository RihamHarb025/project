@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">All Recipes</h1>

    <!-- Success message if recipe is deleted -->
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.recipes.index') }}" class="mb-4">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by title or category..." class="form-control w-full mb-3" />
        <button type="submit" class="btn btn-primary w-full">Search</button>
    </form>

    <!-- Display the list of recipes -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->categories->pluck('name')->join(', ') }}</td>
                    <td>
                        <!-- Delete Recipe Form -->
                        <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
