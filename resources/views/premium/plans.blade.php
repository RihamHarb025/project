@extends('layouts.main')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-green-50 p-10">
    <h1 class="text-4xl font-bold text-green-900 mb-8">Choose Your Premium Plan</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-3xl">
        @foreach($plans as $plan)
        <div class="bg-white rounded-xl shadow p-6 text-center">
            <h2 class="text-2xl font-semibold mb-2">{{ $plan['name'] }}</h2>
            <p class="text-lg text-gray-700 mb-4">${{ number_format($plan['price'], 2) }}</p>
            <a href="{{ route('premium.payment', $plan['id']) }}" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition">Select</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
