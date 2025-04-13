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


@endsection
