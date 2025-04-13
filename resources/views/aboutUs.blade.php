@extends('layouts.main')
@section('content')
<section class="relative w-full h-[600px] overflow-hidden bg-orange-50">
    <!-- Smaller Decorative Image in Corner -->
    <img src="{{ asset('imgs/overlay2.png') }}" 
         alt="Corner Decoration" 
         class="absolute top-0 left-0 w-112 h-112 z-10 opacity-90" />

    <!-- Text Content -->
    <div class="w-full h-full flex items-center justify-end text-center z-20">
        <h1 class="text-7xl text-green-950 font-serif font-bold px-32">
            Why Tasty Nest?
        </h1>
        <!-- <h3 class="text-green-900 font-semibold font-sans text-2xl">
            Our vision is rooted in the belief that food is medicine, joy, and connection. We want to be the spark that ignites a global shift toward mindful eating and self-love through nutrition.
        </h3> -->
    </div>
</section>
@endsection