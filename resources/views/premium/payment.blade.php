@extends('layouts.main')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-orange-50 p-10">
    <form action="{{ route('premium.subscribe') }}" method="POST" class="bg-white p-8 rounded-xl shadow w-full max-w-md">
        @csrf
        <h2 class="text-2xl font-bold mb-4">Pay for {{ $selectedPlan['name'] }}</h2>
        <input type="hidden" name="plan" value="{{ $selectedPlan['name'] }}">
        
        <div class="mb-4">
            <label class="block mb-1 font-medium">Full Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Card Number</label>
            <input type="text" name="card_number" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 rounded transition">Pay ${{ number_format($selectedPlan['price'], 2) }}</button>
    </form>
</div>
@endsection
