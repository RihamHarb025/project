<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
            <!-- Recipe Image -->
            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-52 object-cover rounded-t-lg">

            <!-- Card Body -->
            <div class="p-5 flex flex-col flex-grow">
                <!-- Recipe Title -->
                <h3 class="text-xl font-semibold text-gray-900 mb-2" id="recipe-title-{{ $recipe->id }}">
                    {{ $recipe->title }}
                </h3>

                <!-- Editable Title (hidden by default) -->
                <input type="text" class="edit-title-input hidden w-full px-4 py-2 mb-4 border rounded-lg" 
                       id="edit-title-{{ $recipe->id }}" value="{{ $recipe->title }}" />

                <!-- Recipe Description -->
                <p class="text-gray-600 mb-4" id="recipe-description-{{ $recipe->id }}">
                    {{ Str::limit($recipe->description, 100) }}
                </p>

                <!-- Editable Description (hidden by default) -->
                <textarea class="edit-description-input hidden w-full px-4 py-2 mb-4 border rounded-lg" 
                          id="edit-description-{{ $recipe->id }}">{{ $recipe->description }}</textarea>

                <!-- Tags -->
                @if($recipe->tags->count())
                    <div class="flex flex-wrap gap-2 mb-4" id="tags-{{ $recipe->id }}">
                        @foreach ($recipe->tags as $tag)
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full tag-item-{{ $tag->id }}">
                                {{ $tag->name }}
                                <button class="remove-tag text-red-600 ml-2" data-tag-id="{{ $tag->id }}">✖</button>
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Add Tag Button (Visible when admin clicks edit) -->
                <div class="flex items-center mb-4 hidden" id="add-tag-container-{{ $recipe->id }}">
                    <input type="text" class="add-tag-input w-full px-4 py-2 mb-2 border rounded-lg" placeholder="Add a new tag" id="add-tag-input-{{ $recipe->id }}">
                    <button class="add-tag-btn bg-green-600 text-white px-4 py-2 rounded-lg ml-2">+</button>
                </div>

                <!-- Spacer to push buttons to the bottom -->
                <div class="flex-grow"></div>

                <!-- View Recipe Button -->
                <a href="{{ route('recipes.show', $recipe->id) }}" 
                   class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-4 mx-auto block w-3/4">
                    View Recipe
                </a>
            </div>

            <!-- Footer: User Profile Section -->
            <div class="bg-gray-50 py-4 px-5 flex items-center justify-between mt-4 rounded-b-lg">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.show', $recipe->user->id) }}" class="flex items-center space-x-2">
                        <img src="{{ $recipe->user->profile_picture }}" alt="{{ $recipe->user->name }}" class="w-10 h-10 rounded-full object-cover">
                        <span class="text-green-900 font-semibold">{{ $recipe->user->name }}</span>
                    </a>
                </div>

                <!-- Follow Button (Visible if not already following) -->
                @auth
                    @if(auth()->user()->id == $recipe->user->id)
                        <!-- If the recipe owner is the logged-in user, hide the follow button -->
                        <button class="bg-gray-300 text-gray-700 rounded-full px-6 py-2 mt-3 cursor-not-allowed">
                            You're the creator
                        </button>
                    @elseif(auth()->user()->isFollowing($recipe->user))
                        <button class="bg-gray-300 text-gray-700 rounded-full px-6 py-2 mt-3 cursor-not-allowed">
                            Following
                        </button>
                    @else
                        <form action="{{ route('follow.toggle', $recipe->user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">
                                Follow
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <!-- Admin Controls (visible only for admin) -->
            @if(Auth::user() && Auth::user()->is_admin)
                <div class="admin-controls mt-4 px-4 py-3 flex justify-evenly space-x-4 border-t border-gray-300">
                    <button class="edit-button bg-green-600 text-white hover:bg-green-700 px-4 py-2 rounded-lg transition-all duration-200 ease-in-out" 
                            data-recipe-id="{{ $recipe->id }}">
                        Edit
                    </button>

                    <button class="delete-button bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-lg transition-all duration-200 ease-in-out" 
                            data-recipe-id="{{ $recipe->id }}">
                        Delete
                    </button>
                </div>
            @endif
        </div>
    @endforeach
</div>
