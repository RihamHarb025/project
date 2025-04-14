@extends('layouts.main')
@section('content')

  <!-- Section -->
  <section class="flex flex-col items-center text-center py-16 px-6">

    <!-- Top Text -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-10 max-w-5xl">
      <div class="flex-1">
        <h2 class="text-green-500 font-bold text-3xl mb-4">GOOD FOR YOUR HEALTH</h2>
        <h3 class="text-2xl font-semibold mb-4">Purple Carrot Meals</h3>
        <p class="text-gray-600 mb-4">
          have been clinically proven to help people lose weight and lower LDL cholesterol—in just 4 weeks.
        </p>
        <p class="text-sm text-gray-500 mb-6">
          Plus, when you eat a healthy plant-based diet you may also lower your risk of diabetes.
        </p>
        <h2 class="text-green-500 font-bold text-3xl mb-4">+ GOOD FOR THE EARTH</h2>
        <p class="text-gray-600">
          If everyone in the U.S. ate no meat or cheese just one day per week, it would have the same environmental impact as taking 7.6 million cars off the road.
        </p>
      </div>

      <!-- Right Images -->
      <div class="flex flex-col items-center gap-6 flex-1">
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/Avocado.jpg" alt="Avocado" class="w-48 rounded-full shadow-lg">
        <img src="https://images.unsplash.com/photo-1572449043416-55f4685c9bb2" alt="Bowl" class="w-64 rounded-full shadow-lg">
      </div>
    </div>

    <!-- Quote -->
    <div class="bg-gray-100 text-gray-700 p-8 mt-16 w-full">
      <p class="italic text-lg max-w-3xl mx-auto">
        "A dietary shift toward plant foods and away from animal products is vital for promoting the health of our planet."
      </p>
    </div>

    <!-- Bottom Section -->
    <div class="mt-16 text-center max-w-3xl">
      <h3 class="font-semibold text-xl mb-4">Is it any wonder we're all about cultivating the plant-based revolution?</h3>
      <p class="text-sm text-gray-600 mb-2">
        Our commitment to a plant-based future is powered by positivity and a can-do spirit, and as it spreads it will change the world—for real.
      </p>
      <p class="text-sm text-gray-600">
        <span class="font-bold">FUN FACT:</span> there are over 20,000 edible plants on the planet. Let’s see how many different ways we can stir up some fresh, plant-based fun!
      </p>
    </div>

  </section>
@endsection