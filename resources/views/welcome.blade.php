@extends('layouts.main')
@section('content')

<section class="w-full bg-orange-50 h-[800px] relative  flex justify-center items-center">
  <div class=" w-full h-[800px] relative flex justify-center items-center bg-[url('{{asset('imgs/overlay.png')}}')] bg-cover bg-center"
  <div class="bg-green-950 text-center text-white z-10 relative">
  <!-- <p class="text-white font-bold h-20 py-5">LIMITED TIME: 30% off + free gift in every delivery Learn More </p>
  </div> -->
  <!-- <div class="absolute top-0 left-0  z-0">
    <img src="{{asset('imgs/salad.png')}}" class="lg: w-[600px] h-[600px]">
  </div>
  <div class="absolute top-64 right-10 z-0">
    <img src="{{asset('imgs/omlette.png')}}" class="lg: w-[600px] h-[600px]">
  </div>
  <div class="absolute top-0 right-0 z-0">
    <img src="{{asset('imgs/basil.png')}}" class="lg: w-[200px] h-[200px]">
  </div>
  <div class="absolute bottom-0 left-0 z-0">
    <img src="{{asset('imgs/bowl1.png')}}" class="lg: w-[650px] h-[700px]">
  </div> -->

  <div class="flex flex-col justify-center items-center  gap-5">
    <h1 class="text-7xl text-green-950 max-w-xl text-center font-bold">The easiest way to eat healthy </h1>
      <div class="flex flex-col gap-2  items-center">
     <h3 id="animated-text" class="scroll-up text-2xl text-green-900 opacity-0 font-bold">The best recipes
     </h3>
     <h3 class="text-2xl text-green-900 font-bold">for you and your family</h3>
      </div>
    <button class="bg-green-900 text-white rounded-full text-2xl px-5 py-5  hover:bg-green-950 transition">Get Started</button>
    </div>
</div>
</section>

<section class="relative">

  <div class="absolute top-10 left-20 w-[200px] h-[200px]">
    <img src="{{asset('imgs/drawnBasil1.png')}}" class="w-full h-full">
  </div>

  <div class="flex flex-col items-center gap-4 mt-20">
  <h2 class="text-5xl text-green-950 max-w-xl text-center font-bold">Browse Our Collection of Recipe Categories</h2>
  <h4 class="text-3xl text-green-900 text-center font-bold">from breakfast to dinner and more!</h4>
  </div>

  <div class="absolute top-40 right-20 w-[200px] h-[200px]">
    <img src="{{asset('imgs/drawnBasil2.png')}}" class="w-full h-full">
  </div>

 

  <div class="flex justify-center gap-10 mt-20 z-10">

  <div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4">
      <img src="your-icon-url.png" alt="Icon" class="w-16 h-16 rounded-full object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>

<div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4">
      <img src="your-icon-url.png" alt="Icon" class="w-16 h-16 rounded-full object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>

<div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4">
      <img src="your-icon-url.png" alt="Icon" class="w-16 h-16 rounded-full object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>



  </div>
  
</section>

<section class="relative h-auto mt-40">
<div class="flex flex-col items-center gap-4 mt-20">
  <h2 class="text-5xl text-green-950 max-w-xl text-center font-bold">Never Run Out of Meal Ideas</h2>
  <h4 class="text-3xl text-green-900 text-center font-bold">Choose From 100+ Recipes!</h4>
  </div>

  <div class="flex justify-center gap-10 mt-10">
  <div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4">
      <img src="your-recipe-image-url.jpg" alt="Recipe Image" class="w-32 h-32 rounded-lg object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>

<div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4">
      <img src="your-recipe-image-url.jpg" alt="Recipe Image" class="w-32 h-32 rounded-lg object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>

<div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
  <div class="p-6">
    <div class="flex justify-center mb-4 border">
      <img src="{{asset('imgs/bowl1.png')}}" alt="Recipe Image" class="w-32 h-32 rounded-lg object-cover">
    </div>
    <h2 class="text-2xl font-bold text-center text-green-950 mb-2">Category</h2>
    <p class="text-green-900 font-semibold text-center text-base">A brief description of the recipe or meal goes here, explaining the unique features or benefits. Keep it concise and appealing!</p>
  </div>
</div>

</div>
</section>
<section class="mt-40">

<div class="flex flex-col items-center gap-4 mt-20 ">
  <h2 class="text-5xl text-green-950 max-w-2xl text-center font-bold">Enjoy Tasty Nest with</h2>
  <h4 class="text-3xl text-green-900 text-center font-bold">PREMUIM</h4>
  </div>

  <div class="grid grid-cols-3 gap-6 w-full max-w-7xl mx-auto mt-16">
  <!-- Box 1: Meal Plans -->
  <div class="bg-green-900 bg-opacity-50 p-8 text-white rounded-lg col-span-2 h-[500px]">
    <h2 class="text-4xl font-bold text-white opacity-80">Meal Plans</h2>
    <p class="mt-6 text-xl text-white font-semibold">With Tasty Nest Premium, get personalized meal plans for every week. Take the stress out of planning meals for you and your family!</p>
    <!-- Meal Plan Image -->
    <img src="{{asset('imgs/meal-plan-example.jpg')}}" alt="Meal Plan" class="mt-6 rounded-lg w-full h-[300px] object-cover">
  </div>

  <!-- Box 2: Exclusive Recipes -->
  <div class="bg-green-900 bg-opacity-50 p-8 text-white rounded-lg h-[500px]">
    <h2 class="text-4xl font-bold text-white opacity-80">Exclusive Recipes</h2>
    <p class="mt-6">Gain access to over 100+ exclusive recipes that will elevate your cooking skills and taste buds.</p>
    <!-- Recipe Image -->
    <img src="https://via.placeholder.com/500x300?text=Exclusive+Recipes" alt="Exclusive Recipes" class="mt-6 rounded-lg w-full h-[200px] object-cover">
  </div>

  <!-- Box 3: All the Benefits (Spanning Full Width) -->
  <div class="bg-green-900 bg-opacity-50 p-8 text-white rounded-lg col-span-3 h-[300px]">
    <h2 class="text-4xl font-bold text-white opacity-80">All the Benefits of Premium</h2>
    <p class="mt-6">Subscribe to Tasty Nest Premium and enjoy meal plans, exclusive recipes, grocery shopping lists, and much more to make your cooking life easier!</p>
    <!-- All Benefits Image -->
    <img src="https://via.placeholder.com/1000x400?text=All+Benefits" alt="All Benefits" class="mt-6 rounded-lg w-full h-[200px] object-cover">
  </div>
</div>



</section>

@endsection