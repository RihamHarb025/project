@extends('layouts.main')
@section('content')

<section class="w-full bg-green-50 h-[800px] relative  flex justify-center items-center">
  <div class="w-full h-[800px] relative flex justify-center items-center bg-[url('{{asset('imgs/overlay.png')}}')] bg-cover bg-center">
  
    <div class="flex flex-col justify-center items-center gap-5">
      <h1 class="text-7xl text-green-950 max-w-xl text-center font-bold font-serif">The easiest way to eat healthy</h1>
      <div class="flex flex-col gap-2  items-center">
        <h3 id="animated-text" class="text-2xl text-green-900 font-bold font-sans">The best recipes</h3>
        <h3 class="text-2xl text-green-900 font-bold font-sans">for you and your family</h3>
      </div>
      <a href="{{route('register')}}" class="bg-green-900 text-white rounded-full text-2xl px-6 py-3  hover:bg-green-950 transition duration-300 ease-in-out">Get Started</a>
    </div>
  </div>
</section>

<section class="relative">
  <div class="absolute top-10 left-20 w-[200px] h-[200px] z-1">
    <img src="{{asset('imgs/drawnBasil1.png')}}" class="w-full h-full loading="lazy">
  </div>

  <div class="flex flex-col items-center gap-4 mt-20">
    <h2 class="text-5xl text-green-950 max-w-xl text-center font-bold z-10 font-serif">Browse Our Collection of Recipe Categories</h2>
    <h4 class="text-3xl text-green-900 text-center font-bold z-10">from breakfast to dinner and more!</h4>
  </div>

  <div class="absolute top-40 right-20 w-[200px] h-[200px] z-1">
    <img src="{{asset('imgs/drawnBasil2.png')}}" class="w-full h-full loading="lazy">
  </div>

 

    <div class="flex justify-center gap-12 mt-20 flex-wrap justify-center">
    @foreach($categories as $category)
        <div class="max-w-xl bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200 hover:shadow-2xl transition-transform transform hover:scale-105 hover:translate-y-4 duration-300 ease-in-out">
            <div class="p-8"> 
                <div class="flex justify-center mb-6"> 
                    <img src="{{ $category->image }}" alt="Icon" class="w-40 h-40 rounded-full object-cover shadow-lg border-2 border-green-100"> 
                </div>
                <h2 class="text-4xl font-bold text-center text-green-950 mb-4">{{ $category->name }}</h2> 
                <p class="text-green-700 font-semibold text-center text-lg mb-6">{{ $category->description }}</p> 
                <a href="{{route('recipes.index')}}" class="bg-green-900 text-white rounded-full text-lg px-5 py-2 hover:bg-green-950 transition duration-300 ease-in-out">
                    View Recipes
                </a>
            </div>
        </div>
    @endforeach
</div>


  
</section>


<section class="relative h-auto mt-40">
  <div class="flex flex-col items-center gap-4 mt-20">
    <h2 class="text-5xl text-green-950 max-w-xl text-center font-bold font-serif">Never Run Out of Meal Ideas</h2>
    <h4 class="text-3xl text-green-900 text-center font-bold">Choose From 100+ Recipes!</h4>
  </div>

  <div class="flex justify-center gap-10 mt-10 flex-wrap justify-center">
    @foreach($recipes as $recipe)
        <div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-12 card">
            <div class="p-6 h-full flex flex-col justify-between">
                <div class="flex justify-center mb-4">
                    <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover rounded-t-lg">
                </div>
                <h2 class="text-2xl font-bold text-center text-green-950 mb-2">{{ $recipe->title }}</h2>
                <p class="text-green-900 font-semibold text-center text-base mb-4">{{ $recipe->description }}</p>
                <p class="text-xl text-green-900 italic text-center font-bold">{{ $recipe->categories->isNotEmpty() ? $recipe->categories->first()->name : 'No category' }}</p>
            </div>
        </div>
    @endforeach
</div>
</section>




<section class="mt-40 relative z-0 overflow-hidden">
  <div class="flex flex-col items-center gap-4 mt-20">
    <h2 class="text-5xl text-green-950 max-w-2xl text-center font-bold font-serif">Enjoy Tasty Nest with</h2>
    <h4 class="text-3xl bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] top-4 right-4 text-black text-center font-bold tracking-wider px-6 py-2 rounded-full shadow-md">PREMIUM </h4>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 w-full max-w-7xl mx-auto mt-20 px-6 lg:px-0">
    
    <div class="relative bg-green-50 bg-opacity-70 backdrop-blur-md p-8 rounded-3xl shadow-xl h-[500px] hover:scale-[1.03] transition-all duration-300 ease-in-out border-4 border-white">
      <div class="absolute top-4 right-4 bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] top-4 right-4 text-black text-sm font-bold px-3 py-1 rounded-full shadow-md">Meal Magic</div>
      <h2 class="text-3xl font-bold text-green-950 font-serif mb-4">Meal Plans</h2>
      <p class="text-green-900 font-medium mb-6">Get personalized meal plans every week. Save time and eat better — no more "what’s for dinner?" stress.</p>
      <div class="overflow-hidden rounded-xl mt-auto">
        <img src="{{asset('imgs/meal-plan-example.jpg')}}" alt="Meal Plan" class="w-full h-[240px] object-cover transition-transform duration-300 hover:scale-105">
      </div>
    </div>
    <div class="relative bg-green-50 bg-opacity-70 backdrop-blur-md p-8 rounded-3xl shadow-xl h-[500px] sm:col-span-2 lg:col-span-2 hover:scale-[1.03] transition-all duration-300 ease-in-out border-4 border-white">
      <div class="absolute bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] top-4 right-4 text-black text-sm font-bold px-3 py-1 rounded-full shadow-md">Exclusive</div>
      <h2 class="text-3xl font-bold text-green-950 font-serif mb-4">Save Time and Eat Better</h2>
      <p class="text-green-900 font-medium mb-6">No more “what’s for dinner?” moments. Each week, get a ready-to-go plan with delicious, balanced meals. Grocery lists included — because we love saving you time. </p>
      <div class="overflow-hidden rounded-xl mt-auto">
        <img src="{{asset('imgs/womancooking.jpg')}}" alt="Woman Cooking" class=" mt-4 w-full h-[240px] object-cover transition-transform duration-300 hover:scale-105">
      </div>
    </div>


    <div class="relative bg-green-50 bg-opacity-70 backdrop-blur-md p-8 rounded-3xl shadow-xl h-[400px] sm:col-span-2 lg:col-span-3 hover:scale-[1.02] transition-all duration-300 ease-in-out border-4 border-white">
  <div class="absolute top-4 right-4 bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] text-black text-sm font-bold px-3 py-1 rounded-full shadow-md">All-in-One</div>
  <h2 class="text-3xl font-bold text-green-950 font-serif mb-4">All the Benefits of Premium</h2>
  <p class="text-green-900 font-medium mb-6 text-xl">Enjoy full access to everything Tasty Nest offers:</p>
  
  <ul class="list-disc pl-6 text-green-900 mb-6 text-lg font-semibold">
    <li>Personalized weekly meal plans</li>
    <li>Exclusive recipes to elevate your cooking</li>
    <li>Grocery shopping lists for stress-free shopping</li>
    <li>Save time and eat better every day</li>
  </ul>

</div>
  </div>
</section>


@endsection