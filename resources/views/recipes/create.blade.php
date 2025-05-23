@extends('layouts.main')

@section('content')


<div class="container mx-auto p-6">
        
        @if(session('banned'))
            <div id="bannedModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg p-8 max-w-md shadow-lg text-center">
                    <h2 class="text-2xl font-bold text-red-600 mb-4">⚠️ Access Denied</h2>
                    <p class="text-gray-700 mb-6">You have been banned and cannot create recipes at the moment.</p>
                    <a href="{{ route('home') }}" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-900 transition">Go Back</a>
                </div>
            </div>
        @endif

<section class="mt-16 flex flex-col items-center bg-cover bg-center bg-[url('{{ asset('imgs/basilBg.png') }}')]"> 
  
    <div class="mt-5 max-w-3xl w-full bg-white/70 backdrop-blur-lg p-8 shadow-xl rounded-2xl border border-white/30">
       
        <div class="text-center mb-10">
            <h1 class="text-6xl text-green-950 font-bold drop-shadow-lg">Create A Recipe!</h1>
            <h3 class="text-2xl text-green-900 font-bold mt-3">Add your amazing recipes to our tasty nest collection</h3>
        </div>

      
        <h2 class="text-3xl font-semibold text-green-900 mb-6 text-center">Add a New Recipe</h2>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

           
            <div>
                <label class="block text-gray-800 font-medium mb-2">Recipe Name:</label>
                <input type="text" name="title" required
                       class="w-full px-5 py-3 border rounded-xl bg-white/50 shadow-inner focus:ring-2 focus:ring-green-900 focus:outline-none">
            </div>

           
            <div>
                <label class="block text-gray-800 font-medium mb-2">Description:</label>
                <textarea name="description" required rows="4"
                          class="w-full px-5 py-3 border rounded-xl bg-white/50 shadow-inner focus:ring-2 focus:ring-green-900 focus:outline-none"></textarea>
            </div>

            
            <div>
                <label class="block text-gray-800 font-medium mb-2">Select Category:</label>
                <div class="flex flex-wrap gap-4">
                    @foreach($categories as $category)
                        <label class="flex items-center space-x-2 bg-white/60 px-4 py-2 rounded-lg shadow-md cursor-pointer hover:bg-white hover:shadow-lg transition">
                            <input type="radio" name="category_id" value="{{ $category->id }}" required
                                   class="form-radio text-green-600 focus:ring-green-500">
                            <span class="text-gray-900">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

           
            <div>
                <label class="block text-gray-800 font-medium mb-2">Select Tags:</label>
                <div class="flex flex-wrap gap-3">
                    @foreach($tags as $tag)
                        <label class="flex items-center space-x-2 bg-white/60 px-3 py-2 rounded-lg shadow-md cursor-pointer hover:bg-white hover:shadow-lg transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox text-green-600 focus:ring-green-900">
                            <span class="text-gray-900">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

           
            <div>
                <label class="block text-gray-800 font-medium mb-2">Upload Recipe Image:</label>
                <input type="file" name="image"
                       class="w-full border rounded-xl px-5 py-2 bg-white/50 shadow-inner focus:ring-2 focus:ring-green-900 focus:outline-none">
            </div>

           
            <button type="submit" class="w-full bg-green-900 text-white py-3 rounded-xl shadow-lg hover:bg-green-950 transition transform hover:scale-105">
                Submit Recipe
            </button>
        </form>
    </div>
</section>

@endsection
