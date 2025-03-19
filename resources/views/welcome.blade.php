@extends('layouts.main')
@section('content')


<section class="flex justify-between h-auto w-full mt-10 px-4 py-4 gap-10 relative">

    <div class="absolute left-0 top-0 z-0">
    <img src="{{ asset('imgs/basil.png') }}" alt="Basil" class="w-32 h-auto sm:w-48 lg:w-64">
        </div>

    <div class="absolute right-24 top-0 z-0">
    <img src="{{ asset('imgs/lemon.png') }}" alt="lemon" class="w-32 h-auto sm:w-48 lg:w-64">
        </div>

  <div class="flex flex-col gap-4 max-w-3xl  py-5 px-5 ml-32 z-10">
    <h1 class="font-[Playfair_Display] text-6xl mt-40">Simple and Tasty Recipes</h1>
    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quisquam magni sunt aperiam veniam a eum totam, facilis delectus nostrum maxime ullam, vero sed ipsum amet consequatur esse voluptatum quasi?</p>
    <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
  </div>

  <div class="rounded border absolute bottom-10 right-20 w-80  px-5 py-5 z-10 bg-white bg-opacity-80">
      <div class="flex flex-col gap-2">
          <div class="w-16 h-16 rounded-full border">
              <img src="#">
          </div>

          <div class="flex flex-col border">
              <h4>Name</h4>
              <p>Description</p>
          </div>
      </div>
      <div id="feedback"></div>
  </div>

  <div class="flex justify-center items-center flex-1 mb-10 md:mb-16 lg:mb-0 z-0 ">
    <img class="w-[90%] h-full " src="{{ asset('imgs/saladbowl.png') }}" alt="salad bowl" />
  </div>
</section>

    <section class="h-auto w-full flex flex-col justify-center items-center gap-32 mt-10">
      <h2 class="text-5xl order">
          Check Out Our Categories
      </h2>


  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8  ">
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:scale-105 transform transition-all hover:shadow-xl w-64 max-w-[16rem]">
      <img src="#" alt="Category 1" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Breakfast</h3>
        <p class="text-gray-600 mt-2">Description</p>
        <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
      </div>
        </div>

      <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:scale-105 transform transition-all hover:shadow-xl w-64 max-w-[16rem]">
      <img src="#" alt="Category 2" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Lunch</h3>
        <p class="text-gray-600 mt-2">Description</p>
        <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
      </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:scale-105 transform transition-all hover:shadow-xl w-64 max-w-[16rem]">
      <img src="#" alt="Category 3" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Dinner</h3>
        <p class="text-gray-600 mt-2">Description</p>
        <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
      </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:scale-105 transform transition-all hover:shadow-xl w-64 max-w-[16rem]">
      <img src="#" alt="Category 4" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Snacks</h3>
        <p class="text-gray-600 mt-2">Description</p>
        <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
      </div>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:scale-105 transform transition-all hover:shadow-xl w-64 max-w-[16rem]">
      <img src="#" alt="Category 3" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Dessert</h3>
        <p class="text-gray-600 mt-2">Description</p>
        <button class="bg-red-800 hover:bg-red-900 text-white rounded py-2 px-3 max-w-fit mt-3">Get Started</button>
      </div>
        </div>
</div>
</section>

<section class="w-full h-auto flex flex-col justify-center gap-5 mt-16">
    <div class="text-center">
<h2 class="text-5xl"> Some Of Our Recipes </h2>
    </div>

    <div class="flex justify-center gap-10 flex-wrap">
    <!-- Recipe Card 1 -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out overflow-hidden">
        <div class="flex justify-center mt-6">
            <img src="your-recipe-image.jpg" alt="Recipe" class="w-32 h-32 object-cover rounded-full shadow-md border-4 border-gray-200 transition-transform duration-300 hover:scale-105">
        </div>
        <div class="p-6 text-center">
            <h3 class="text-2xl font-semibold text-gray-800 mb-2 transition-colors duration-300 hover:text-red-700">Delicious Recipe</h3>
            <p class="text-gray-600 text-sm">A short description of the recipe that looks tasty and inviting.</p>
            <button class="mt-4 bg-red-800 hover:bg-red-900 text-white font-semibold py-2 px-4 rounded shadow-md transition-all duration-300">View Recipe</button>
        </div>
    </div>

    <!-- Recipe Card 2 -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out overflow-hidden">
        <div class="flex justify-center mt-6">
            <img src="your-recipe-image.jpg" alt="Recipe" class="w-32 h-32 object-cover rounded-full shadow-md border-4 border-gray-200 transition-transform duration-300 hover:scale-105">
        </div>
        <div class="p-6 text-center">
            <h3 class="text-2xl font-semibold text-gray-800 mb-2 transition-colors duration-300 hover:text-red-700">Delicious Recipe</h3>
            <p class="text-gray-600 text-sm">A short description of the recipe that looks tasty and inviting.</p>
            <button class="mt-4 bg-red-800 hover:bg-red-900 text-white font-semibold py-2 px-4 rounded shadow-md transition-all duration-300">View Recipe</button>
        </div>
    </div>

    <!-- Recipe Card 3 -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out overflow-hidden">
        <div class="flex justify-center mt-6">
            <img src="your-recipe-image.jpg" alt="Recipe" class="w-32 h-32 object-cover rounded-full shadow-md border-4 border-gray-200 transition-transform duration-300 hover:scale-105">
        </div>
        <div class="p-6 text-center">
            <h3 class="text-2xl font-semibold text-gray-800 mb-2 transition-colors duration-300 hover:text-red-700">Delicious Recipe</h3>
            <p class="text-gray-600 text-sm">A short description of the recipe that looks tasty and inviting.</p>
            <button class="mt-4 bg-red-800 hover:bg-red-900 text-white font-semibold py-2 px-4 rounded shadow-md transition-all duration-300">View Recipe</button>
        </div>
    </div>
</div>
</section>

<section class="mt-16">
<div class="relative w-full h-96 bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('{{ asset('imgs/overlay.jpg') }}');">
    <div class="bg-black bg-opacity-50 p-6 rounded-lg text-center">
        <h2 class="text-3xl font-bold">Delicious Recipes Await!</h2>
        <p class="mt-2 text-lg">Explore our premium recipes and elevate your cooking skills.</p>
        <button class="mt-4 bg-gradient-to-r from-yellow-300 via-yellow-200 to-yellow-100 text-black rounded-md  px-4 py-2
        transform transition-all hover:scale-105  animate-glow ">Get Premuim</button>
    </div>
</div>
</section>


@endsection