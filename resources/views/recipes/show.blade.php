@extends('layouts.main')
@section('content')
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Recipe Image -->
                <img src="{{ $recipe->image }}" class="img-fluid rounded" alt="{{ $recipe->title }}">

                <!-- Recipe Title -->
                <h1 class="mt-4">{{ $recipe->title }}</h1>

                <!-- Recipe Description -->
                <p class="lead">{{ $recipe->description }}</p>

                <!-- Additional Attributes -->
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Category:</strong> {{ $recipe->categories->pluck('name')->join(', ') }}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{ $recipe->created_at->format('M d, Y') }}</li>
                </ul>
                <ul>
                        @foreach ($recipe->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                                    <!-- Back Button -->
                <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to Recipes</a>
            </div>
        </div>
    </div>
</body>
@endsection