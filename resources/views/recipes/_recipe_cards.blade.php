@foreach ($recipes as $recipe)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <!-- Recipe Image -->
            <img src="{{ $recipe->image }}" class="card-img-top" alt="{{ $recipe->title }}" style="height: 200px; object-fit: cover;">

            <!-- Card Body -->
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                <ul>
                    @foreach ($recipe->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
            </div>
        </div>
    </div>
@endforeach