@extends('layouts.main')
@section('content')

<section class="relative">
		<div class="container mx-auto flex flex-col lg:flex-row items-center gap-12 mt-10">
		  <!-- Content -->
		  <div class="flex flex-1 flex-col items-center lg:items-start overflow-hidden">
			<h2 class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-green-500 font-bold text-3xl md:text-4 lg:text-6xl text-center lg:text-center mb-2 py-2 slideUp">
				Learn. Cook. Share.<br/>Cooking Made Easy.
			</h2>
			<div class="overflow-hidden">
			<p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
				Say good bye to long and frustrating
			</p>
			<p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
				food blogs and recipe videos. Access </p>
			<p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
				our recipe cards to prepare any dish </p>
			<p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
				in minutes.</p>
			</p>
		    </div>
			<div class="flex mx-auto md:mx-40 mt-6 justify-center flex-wrap gap-6">
			  <a href="#search-dish-call">
			  <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white text-xl font-regular py-2 px-4 rounded transition duration-200 ease-in-out bg-blue-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 ...">
				Browse Dish
			  </button>
			</a>
			</div>
		  </div>
		  <!-- Image -->
		  <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
			<img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full fadeInRotate" src="{{ asset('imgs/saladbowl.png') }}" alt="salad bowl" />
		  </div>
		</div>
		<!-- Rounded Rectangle -->
		<div
		  class="
			hidden
			md:block
			overflow-hidden
			bg-bookmark-purple
			rounded-l-full
			absolute
			h-80
			w-2/4
			top-32
			right-0
			lg:
			-bottom-28
			lg:-right-36
		  "
		></div>
	  </section>

	  <!--Browse Dish Section-->
	  <section class="relative md:m-10">
		  <div id="search-dish-call" class="font-medium text-2xl md:text-4xl text-center mb-6">Search Your Favorite Dish</div>
		  <div class="bg-white p-3 shadow-sm rounded-sm">
			  <!--Search bar-->
			  <div class="border rounded overflow-hidden flex mb-4">
				<input id="home-dish-search-bar" type="text" class="w-11/12 px-4 py-2 border-gray-300 focus:ring-blue-600 font-regular" placeholder="What are you looking for?">
				<button class="flex w-1/12 items-center justify-center md:px-4 border-l">
				  <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
				</button>
			  </div>

			  <!--Recent Posts-->
			  <p id="home-no-posts" class="hidden text-center my-4 text-sm font-medium text-gray-400">No Dishes Found</p>
			  <div id="home-posts" class="grid grid-cols-1 md:grid-cols-4 gap-3">

			  </div>
		  </div>
	  </section>
	  <script type="text/javascript" src='../scripts/loginHandler.js'></script>
	  <script type="text/javascript" src='../scripts/homeDishesHandler.js'></script>

	

</body>
@endsection
</html>
