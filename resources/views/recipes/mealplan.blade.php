

@extends('layouts.main')

@section('content')
<div class="bg-orange-50 min-h-screen flex flex-col justify-center items-center px-4 py-10">
    <div class="text-center max-w-3xl">
        <h1 class="text-7xl md:text-5xl font-bold font-serif text-green-950 leading-tight">
        Healthy Eating Starts with a <span class="relative inline-block">
                <span class="z-10 relative">Plan</span>
                <span class="absolute -bottom-1 left-0 w-full h-3 bg-green-200 rounded-full z-0"></span>
            </span>
        </h1>
        <p class="mt-4 text-green-900 font-semibold text-2xl">
        Get nutritious, chef-crafted meals tailored to your goals and lifestyle.
        </p>
        <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="#" class="bg-yellow-400 text-black font-semibold py-2 px-6 rounded-full animate-glow hover:bg-yellow-500 transition">
        With Premium
        </a>
        </div>
    </div>

    <!-- <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl w-full auto-rows-[200px]">
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 1" class="rounded-3xl w-full h-full object-cover col-span-2 row-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 2" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 3" class="rounded-3xl w-full h-full object-cover row-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 4" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 5" class="rounded-3xl w-full h-full object-cover col-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 6" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 6" class="rounded-3xl w-full h-full object-cover" />
    </div> -->
</div>
<section class=" flex flex-col justify-center items-center px-4 py-10">
    
<div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl w-full auto-rows-[200px]">
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 1" class="rounded-3xl w-full h-full object-cover col-span-2 row-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 2" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 3" class="rounded-3xl w-full h-full object-cover row-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 4" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 5" class="rounded-3xl w-full h-full object-cover col-span-2" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 6" class="rounded-3xl w-full h-full object-cover" />
        <img src="{{asset('imgs/chia_pudding.jpeg')}}" alt="Dish 6" class="rounded-3xl w-full h-full object-cover" />
    </div>
</section>
@endsection
