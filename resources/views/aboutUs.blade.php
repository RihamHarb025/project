@extends('layouts.main')
@section('content')
<section class="relative w-full h-[600px] overflow-hidden bg-orange-50">
    <!-- Smaller Decorative Image in Corner -->
    <img src="{{ asset('imgs/overlay2.png') }}" 
         alt="Corner Decoration" 
         class="absolute top-0 left-0 w-112 h-112 z-10 opacity-90" />

    <!-- Text Content -->
    <div class="w-full h-full flex items-center justify-end z-20 pr-8 md:pr-32">
        <div class="text-right max-w-2xl space-y-6 px-4">
            <h1 class="text-5xl md:text-7xl text-green-950 font-serif font-bold">
                Why Tasty Nest?
            </h1>
            <h3 class="text-lg md:text-2xl text-green-900 font-semibold font-sans leading-relaxed">
                Our vision is rooted in the belief that food is medicine, joy, and connection. 
                We want to be the spark that ignites a global shift toward mindful eating and self-love through nutrition.
            </h3>
        </div>
    </div>
</section>

<!-- Recipes Section -->
<section class="py-24 px-6 bg-white relative mt-16">
    <!-- Decorative image positioned in top-right -->
    <img src="{{ asset('imgs/overlay3.png') }}" 
         alt="Top Right Decoration" 
         class="absolute top-0 right-0 w-120 h-112 z-10 opacity-90" />

    <div class="flex flex-col md:flex-row items-start gap-12">
        <div class="ml-4 md:ml-60">
            <h1 class="text-5xl md:text-8xl font-serif text-green-950 font-bold leading-tight text-left">
                We<br>
                Offer<br>
                Healthy <br>
                Recipes
            </h1>
        </div>
    </div>
</section>
<!-- What We Offer -->
<!-- What We Offer -->
<section class="py-20 px-6 md:px-32 space-y-24">
    <!-- <h2 class="text-4xl font-serif font-bold text-green-950 text-center mb-4">What We Offer</h2> -->

    <!-- Wholesome Recipes -->
    <div class="flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('imgs/offer1.jpg') }}" alt="Wholesome Recipes" class="rounded-2xl w-full md:w-1/2 shadow-md" />
        <div class="w-full md:w-1/2">
            <h3 class="text-2xl font-semibold text-green-900 mb-4">Wholesome Recipes</h3>
            <p class="text-green-800 text-lg leading-relaxed">
                Nutritionally balanced meals made with real ingredients and a lot of love.
                Every recipe is designed to nourish your body and bring joy to your plate.
            </p>
        </div>
    </div>

    <!-- Easy & Fast -->
    <div class="flex flex-col-reverse md:flex-row items-center gap-12">
        <div class="w-full md:w-1/2">
            <h3 class="text-2xl font-semibold text-green-900 mb-4">Easy & Fast</h3>
            <p class="text-green-800 text-lg leading-relaxed">
                Quick to make, easy to follow — perfect for students, busy bees, or anyone craving delicious food without the wait.
            </p>
        </div>
        <img src="{{ asset('imgs/offer2.jpg') }}" alt="Easy and Fast Recipes" class="rounded-2xl w-full md:w-1/2 shadow-md" />
    </div>

    <!-- Premium Goodness -->
    <div class="flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('imgs/offer3.jpg') }}" alt="Premium Recipes" class="rounded-2xl w-full md:w-1/2 shadow-md" />
        <div class="w-full md:w-1/2">
            <h3 class="text-2xl font-semibold text-green-900 mb-4">Premium Goodness</h3>
            <p class="text-green-800 text-lg leading-relaxed">
                Unlock exclusive recipes designed for glowing skin, energy boosts, and uplifting your mood. Premium doesn't just mean fancy—it means functional & fabulous. ✨
            </p>
        </div>
    </div>
</section>


<!-- Our Story -->
<section class="py-20 bg-white relative px-6 md:px-32 flex flex-col md:flex-row items-center gap-12">
    <img src="{{ asset('imgs/team_cooking.jpeg') }}" alt="Our Story Image" class="rounded-2xl w-full md:w-1/2 shadow-md" />
    <div class="w-full md:w-1/2">
        <h2 class="text-4xl font-serif font-bold text-green-950 mb-6">Our Story</h2>
        <p class="text-green-800 text-lg leading-relaxed">
            Tasty Nest started as a small idea in a cozy kitchen with a big dream—to make healthy eating simple, exciting, and fun.
            What began as a collection of family recipes blossomed into a space where food lovers can find inspiration, flavor, and purpose.
        </p>
    </div>
</section>

<!-- Why We’re Different -->
<section class="py-24 bg-orange-50 px-6 md:px-32 text-center">
    <h2 class="text-4xl font-serif font-bold text-green-950 mb-12">Why We’re Different</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="space-y-4">
            <div class="text-4xl">🌱</div>
            <h3 class="text-xl font-semibold text-green-900">Holistic Wellness</h3>
            <p class="text-green-800">We go beyond calories — we believe food heals, energizes, and connects.</p>
        </div>
        <div class="space-y-4">
            <div class="text-4xl">👩‍🍳</div>
            <h3 class="text-xl font-semibold text-green-900">For Everyone</h3>
            <p class="text-green-800">Our recipes are beginner-friendly, culturally diverse, and budget-conscious.</p>
        </div>
        <div class="space-y-4">
            <div class="text-4xl">🌸</div>
            <h3 class="text-xl font-semibold text-green-900">Aesthetic & Functional</h3>
            <p class="text-green-800">We focus on visual harmony + useful features that spark joy in the kitchen!</p>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-green-950 text-white px-6 md:px-32 text-center">
    <h2 class="text-4xl font-serif font-bold mb-6">Ready to Cook with Purpose?</h2>
    <p class="text-lg mb-8 max-w-2xl mx-auto">
        Join our community of mindful eaters and access recipes that nourish the body and soul. ✨
    </p>
    <a href="{{ route('register') }}" class="bg-orange-300 hover:bg-orange-400 text-green-950 font-bold py-3 px-6 rounded-xl transition">
        Get Started
    </a>
</section>


@endsection
