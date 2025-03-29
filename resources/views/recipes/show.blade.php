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
    </div>
</body>
@endsection
