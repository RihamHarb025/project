<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
            <!-- Recipe Image -->
            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-52 object-cover rounded-t-lg">

            <!-- Card Body -->
            <div class="p-5 flex flex-col flex-grow">
                <!-- Recipe Title -->
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $recipe->title }}</h3>
                
                <!-- Recipe Description -->
                <p class="text-gray-600 mb-4">{{ Str::limit($recipe->description, 100) }}</p>

                <!-- Tags (with flex-wrap to ensure neat layout) -->
                @if($recipe->tags->count())
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($recipe->tags as $tag)
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Created by User -->
                <div class="mt-3 text-gray-500 text-sm">
                    <span class="font-semibold text-gray-700">Created by: </span>
                    <a href="{{ route('profile.show', $recipe->user->id) }}" class="text-green-600 hover:text-green-800">
                        {{ $recipe->user->name }}
                    </a>
                </div>

                <!-- Spacer to push buttons to the bottom -->
                <div class="flex-grow"></div>

                <!-- Follow Button (Visible if not already following) -->
                @auth
                    @if(auth()->user()->id == $recipe->user->id)
                        <!-- If the recipe owner is the logged-in user, hide the follow button -->
                        <button class="bg-gray-300 text-gray-700 rounded-full px-6 py-2 mt-3 cursor-not-allowed mx-auto block w-3/4">
                            You're the creator
                        </button>
                    @elseif(auth()->user()->isFollowing($recipe->user))
                        <button class="bg-gray-300 text-gray-700 rounded-full px-6 py-2 mt-3 cursor-not-allowed mx-auto block w-3/4">
                            Following
                        </button>
                    @else
                        <form action="{{ route('follow.toggle', $recipe->user->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="bg-green-900 text-white rounded-full px-6 py-2 mx-auto block w-3/4 hover:bg-green-950">
                                Follow
                            </button>
                        </form>
                    @endif
                @endauth

                <!-- View Recipe Button -->
                <a href="{{ route('recipes.show', $recipe->id) }}" 
                   class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-4 mx-auto block w-3/4">
                    View Recipe
                </a>
            </div>
        </div>
    @endforeach
</div>
