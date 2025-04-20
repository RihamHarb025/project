@extends('layouts.main')

@section('content')

<section class="relative w-full h-[600px] overflow-hidden bg-green-50">
    
    <img src="{{ asset('imgs/overlay2.png') }}" 
         alt="Corner Decoration" 
         class="absolute top-0 left-0 w-112 h-112 z-10 opacity-90 hidden md:block" /> 

    <div class="w-full h-full flex items-center justify-end z-20 pr-8 md:pr-32">
        <div class="text-right max-w-2xl space-y-6 px-4">
            <h1 class="text-5xl md:text-7xl text-center text-green-950 font-serif font-bold">
                Why Tasty Nest?
            </h1>
            <h3 class="text-lg md:text-2xl text-center text-green-900 font-semibold font-sans leading-relaxed">
                Our vision is rooted in the belief that food is medicine, joy, and connection. 
                We want to be the spark that ignites a global shift toward mindful eating and self-love through nutrition.
            </h3>
        </div>
    </div>
</section>

<section class="bg-white py-16 px-4 md:px-20">
    <div class="text-center mb-14">
        <h2 class="text-4xl font-serif font-bold text-green-950">Our Values</h2>
        <p class="text-green-900 mt-4 text-lg max-w-2xl mx-auto">
            Everything we create at Tasty Nest is guided by purpose, passion, and a love for healing food.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

        <div class="bg-green-50 rounded-2xl p-6 shadow-md pt-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="relative flex justify-center mb-4">
                <div class="absolute inset-0 flex items-center justify-center z-0">
                    <div class="w-20 h-20 bg-white border-2 border-green-950 rounded-full transition-colors duration-300 hover:bg-orange-100"></div>
                </div>
                <i class="fa-solid fa-seedling relative z-10 text-4xl text-green-700 transition-colors duration-300 hover:text-green-900"></i>
            </div>
            <h3 class="text-xl font-bold text-green-950 mb-2 mt-5">Nourish</h3>
            <p class="text-green-900">Wholesome meals that make you feel good — inside and out.</p>
        </div>

        <div class="bg-green-50 rounded-2xl p-6 shadow-md pt-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="relative flex justify-center mb-4">
                <div class="absolute inset-0 flex items-center justify-center z-0">
                    <div class="w-20 h-20 bg-white border-2 border-green-950 rounded-full transition-colors duration-300 hover:bg-orange-100"></div>
                </div>
                <i class="fa-solid fa-hands-praying relative z-10 text-4xl text-green-700 transition-colors duration-300 hover:text-green-900"></i>
            </div>
            <h3 class="text-xl font-bold text-green-950 mb-2 mt-5">Connect</h3>
            <p class="text-green-900">Food brings people together. Let’s build a community that cooks and cares.</p>
        </div>

        <div class="bg-green-50 rounded-2xl p-6 shadow-md pt-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="relative flex justify-center mb-4">
                <div class="absolute inset-0 flex items-center justify-center z-0">
                    <div class="w-20 h-20 bg-white border-2 border-green-950 rounded-full transition-colors duration-300 hover:bg-orange-100"></div>
                </div>
                <i class="fa-solid fa-lightbulb relative z-10 text-4xl text-green-700 transition-colors duration-300 hover:text-green-900"></i>
            </div>
            <h3 class="text-xl font-bold text-green-950 mb-2 mt-5">Inspire</h3>
            <p class="text-green-900">Creative recipes that light a spark in your kitchen adventures!</p>
        </div>
    </div>
</section>

<section class="bg-green-50 py-20 px-6 md:px-24 relative">
    <div class="text-center mb-14">
        <h2 class="text-4xl font-serif font-bold text-green-950">How Tasty Nest Was Whisked Into Life</h2>
        <p class="text-green-900 mt-4 text-lg max-w-2xl mx-auto">
            We started small, mixing love, tradition, and modern flavors — and we’ve been rising ever since. Here’s how we grew.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
            <div class="hover:shadow-lg p-6 transition-all duration-300 rounded-xl bg-white shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fa-solid fa-hand-sparkles text-4xl text-green-700 mr-4"></i>
                    <h4 class="text-2xl font-bold text-green-950">Step 1: The Spark</h4>
                </div>
                <p class="text-green-900">Our founder’s passion for mindful eating started with family recipes and heartwarming dinners.</p>
            </div>
            <div class="hover:shadow-lg p-6 transition-all duration-300 rounded-xl bg-white shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fa-solid fa-book-open text-4xl text-green-700 mr-4"></i>
                    <h4 class="text-2xl font-bold text-green-950">Step 2: The Recipe Book</h4>
                </div>
                <p class="text-green-900">From notes to website — we turned our cozy kitchen memories into a digital home for foodies.</p>
            </div>
            <div class="hover:shadow-lg p-6 transition-all duration-300 rounded-xl bg-white shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fa-solid fa-users text-4xl text-green-700 mr-4"></i>
                    <h4 class="text-2xl font-bold text-green-950">Step 3: The Community</h4>
                </div>
                <p class="text-green-900">We’re now a growing fam of recipe lovers who eat with joy and cook with intention.</p>
            </div>
        </div>

        <div class="flex justify-center">
            <img src="{{ asset('imgs/saladAboutus.jpg') }}" alt="Cute Cooking Illustration" class="max-w-md w-full rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
        </div>
    </div>

    <div class="mt-32 text-center">
        <blockquote class="text-2xl italic text-green-950 max-w-xl mx-auto font-bold">
            “Tasty Nest was born from a simple love for food and connection. Every dish is a story, and every recipe is an invitation to join our journey.”
        </blockquote>
        <p class="mt-4 text-green-900 font-semibold">- The Founder</p>
    </div>
</section>

@endsection
