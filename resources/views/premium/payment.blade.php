@extends('layouts.main')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-16 mt-8">
    <!-- Step Indicator and Progress Bar -->
    <div class="w-full max-w-md mb-8">
        <div class="flex justify-between text-lg text-green-950">
            <span>Step 1/2</span> <!-- First step -->
            <span>Step 2/2</span> <!-- Second step -->
        </div>
        <div class="w-full bg-gray-200 h-4 mt-2 rounded-full mb-32">
            <div class="bg-green-950 h-4 w-full rounded-full transition-all duration-300"></div> <!-- Progress bar for Step 2 -->
        </div>
    </div>

    <!-- Payment Form Section (Gift Card Style) -->
    <form action="{{ route('premium.subscribe') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md transform transition-all duration-500 hover:scale-105">
        @csrf
        <h2 class="text-3xl font-semibold text-center text-green-950 mb-6">Pay for {{ $selectedPlan['name'] }}</h2>
        <input type="hidden" name="plan" value="{{ $selectedPlan['name'] }}">
        
        <!-- Full Name Input -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" class="w-full border-2 border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all" required>
        </div>

        <!-- Card Number Input -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Card Number</label>
            <input type="text" name="card_number" class="w-full border-2 border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] text-black font-semibold py-3 rounded-xl shadow-xl transform transition-all duration-300 hover:scale-105">
            Pay ${{ number_format($selectedPlan['price'], 2) }}
        </button>
    </form>
</div>
@endsection
