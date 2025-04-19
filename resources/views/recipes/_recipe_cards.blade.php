<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-auto"> 
            <!-- Recipe Image -->
            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover rounded-t-lg"> 
           
            <!-- Card Body -->
            <div class="p-5 flex flex-col flex-grow">
                <!-- Recipe Title -->
                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    <span class="recipe-title" id="recipe-title-{{ $recipe->id }}">{{ $recipe->title }}</span>
                    <input type="text" class="recipe-title-input hidden w-full border border-gray-300 rounded px-2 py-1" value="{{ $recipe->title }}" data-recipe-id="{{ $recipe->id }}">
                </h3>

                <!-- Recipe Description -->
                <p class="text-gray-600 mb-4">
                    <span class="recipe-description" id="recipe-description-{{ $recipe->id }}">{{ Str::limit($recipe->description, 100) }}</span>
                    <textarea class="recipe-description-input hidden w-full border border-gray-300 rounded px-2 py-1" data-recipe-id="{{ $recipe->id }}">{{ $recipe->description }}</textarea>
                </p>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($recipe->categories as $category)
                        <span class="text-green-950 font-bold text-2xl">{{ $category->name }}</span>
                    @endforeach
                </div>

                <!-- Tags -->
                @if($recipe->tags->count())
                    <div class="flex flex-wrap gap-2 mb-4" id="tags-{{ $recipe->id }}">
                        @foreach ($recipe->tags as $tag)
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full tag-item-{{ $tag->id }}">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Editable Tags (Checkboxes) -->
                <div class="hidden editable-tags mb-4" id="editable-tags-{{ $recipe->id }}">
                    @foreach ($tags as $tag)
                        <label class="inline-flex items-center mr-2">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                @if($recipe->tags->contains($tag->id)) checked @endif
                                class="tag-checkbox">
                            <span class="ml-1 text-sm text-gray-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>

                <!-- Editable Categories (Radio Buttons) -->
                <div class="hidden editable-categories mb-4" id="editable-categories-{{ $recipe->id }}">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center mr-2">
                            <input type="radio" name="category_id_{{ $recipe->id }}" value="{{ $category->id }}"
                                @if($recipe->categories->contains($category->id)) checked @endif
                                class="category-radio">
                            <span class="ml-1 text-sm text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>

                <!-- Spacer to push buttons to the bottom -->
                <div class="flex-grow"></div>

                <!-- View Recipe Button -->
                <a href="{{ route('recipes.show', $recipe->id) }}" 
                   class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out text-center mt-4 mx-auto block w-3/4">
                    View Recipe
                </a>

                <!-- Edit Button (only for the recipe owner) -->
                @auth
                    @if(auth()->user()->id == $recipe->user->id)
                        <button 
                            class="bg-yellow-500 text-white rounded-full px-6 py-2 hover:bg-yellow-600 w-full mt-2 edit-btn" 
                            data-recipe-id="{{ $recipe->id }}">
                            Edit
                        </button>
                    @endif
                @endauth

                <!-- Admin Delete Button -->
                @auth
                    @if(auth()->user()->is_admin)
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this recipe?');" 
                              class="mt-2 mx-auto w-3/4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded-full px-6 py-2 hover:bg-red-700 w-full">
                                Delete Recipe
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <!-- Edit Actions (Save & Cancel) -->
            <div class="edit-actions hidden mt-4" data-recipe-id="{{ $recipe->id }}">
                <button class="bg-green-600 text-white rounded-full px-6 py-2 hover:bg-green-700 w-full cancel-btn">
                    Cancel
                </button>
                <button class="bg-blue-600 text-white rounded-full px-6 py-2 hover:bg-blue-700 w-full mt-2 save-btn">
                    Save
                </button>
            </div>

            <!-- Footer: User Profile Section -->
            <div class="bg-gray-50 py-4 px-5 flex items-center justify-between mt-2 rounded-b-lg">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('users.show', ['user' => $recipe->user->id]) }}" class="flex items-center space-x-2">
                        <img src="{{ $recipe->user->profile_picture }}" alt="{{ $recipe->user->name }}" class="w-10 h-10 rounded-full object-cover">
                        <span class="text-green-900 font-semibold">{{ $recipe->user->name }}</span>
                    </a>
                </div>

                <!-- Follow Button (Visible if not already following) -->
                @auth
                    @if(auth()->user()->id == $recipe->user->id)
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
        </div>
    @endforeach
</div>

<!-- Edit Actions Script -->
<script>
    $(document).ready(function () {
        $('.save-btn').click(function () {
    let id = $(this).closest('.edit-actions').data('recipe-id');
    let title = $(`.recipe-title-input[data-recipe-id="${id}"]`).val();
    let description = $(`.recipe-description-input[data-recipe-id="${id}"]`).val();

    let tags = [];
    $(`#editable-tags-${id} .tag-checkbox:checked`).each(function () {
        tags.push($(this).val());
    });

    let category = $(`#editable-categories-${id} .category-radio:checked`).val();

    // Send the data via AJAX to your Laravel controller
    $.ajax({
        url: '/recipes/update/' + id,  // You may need to adjust the URL to your Laravel route
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',  // CSRF token for protection
            title: title,
            description: description,
            tags: tags,
            category: category
        },
        success: function(response) {
            // Handle the success response from the server
            if (response.success) {
                // Update the UI with the new data
                $(`#recipe-title-${id}`).text(title).show();
                $(`.recipe-title-input[data-recipe-id="${id}"]`).addClass('hidden');

                $(`#recipe-description-${id}`).text(description).show();
                $(`.recipe-description-input[data-recipe-id="${id}"]`).addClass('hidden');

                $(`#tags-${id}`).html(response.updatedTags).show();
                $(`#editable-tags-${id}`).addClass('hidden');
                $(`#editable-categories-${id}`).addClass('hidden');

                // Hide the edit actions
                $(`.edit-actions[data-recipe-id="${id}"]`).addClass('hidden');
                $(`.edit-btn[data-recipe-id="${id}"]`).show();

                alert('Recipe updated successfully!');
            } else {
                alert('There was an error updating the recipe.');
            }
        },
        error: function() {
            alert('Error saving data. Please try again.');
        }
    });
});
        $('.cancel-btn').click(function () {
            let id = $(this).closest('.edit-actions').data('recipe-id');
            $(`#recipe-title-${id}`).show();
            $(`.recipe-title-input[data-recipe-id="${id}"]`).addClass('hidden');

            $(`#recipe-description-${id}`).show();
            $(`.recipe-description-input[data-recipe-id="${id}"]`).addClass('hidden');

            $(`#tags-${id}`).show();
            $(`#editable-tags-${id}`).addClass('hidden');

            $(`#editable-categories-${id}`).addClass('hidden');

            $(`.edit-actions[data-recipe-id="${id}"]`).addClass('hidden');
            $(`.edit-btn[data-recipe-id="${id}"]`).show();
        });

        $('.save-btn').click(function () {
            let id = $(this).closest('.edit-actions').data('recipe-id');
            let title = $(`.recipe-title-input[data-recipe-id="${id}"]`).val();
            let description = $(`.recipe-description-input[data-recipe-id="${id}"]`).val();

            let tags = [];
            $(`#editable-tags-${id} .tag-checkbox:checked`).each(function () {
                tags.push($(this).val());
            });

            let category = $(`#editable-categories-${id} .category-radio:checked`).val();

            // TODO: Send this via AJAX to your Laravel controller
            console.log({
                id,
                title,
                description,
                tags,
                category
            });

            alert('Form data ready! You can now implement the AJAX call to save.');
        });
    });
</script>
