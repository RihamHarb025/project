<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
            <!-- Recipe Image -->
            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-52 object-cover rounded-t-lg">

            <!-- Card Body -->
            <div class="p-5 flex flex-col flex-grow">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $recipe->title }}</h3>
                <p class="text-gray-600 mb-3">{{ Str::limit($recipe->description, 100) }}</p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($recipe->tags as $tag)
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <!-- View Recipe Button -->
                <a href="{{ route('recipes.show', $recipe->id) }}" 
                   class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-auto">
                    View Recipe
                </a>
            </div>
        </div>
    @endforeach
</div>
