@extends('layouts.main')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center p-6">
    <!-- Outer Container with border/shadow -->
    <div class="w-full max-w-6xl bg-white shadow-2xl border-2 border-green-950/20 rounded-3xl p-10">

        <!-- Step Indicator step 1/2  la tsir 2/2 -->
        <div class="w-full max-w-md mb-8 mx-auto">
            <div class="flex justify-between text-lg text-green-950">
                <span>Step 1/2</span>
                <span>Step 2/2</span>
            </div>
            <div class="w-full bg-gray-200 h-4 mt-2 rounded-full mb-32">
                <div class="bg-green-950 h-4 w-1/2 rounded-full transition-all duration-300 mb-16"></div>
            </div>
        </div>

        <!-- Premium Plans Section -->
        <h1 class="text-5xl font-bold text-green-950 mb-16 font-serif text-center">Choose Your Premium Plan</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl mx-auto">
            @foreach($plans as $plan)
            <div class="bg-white rounded-xl shadow-lg p-8 text-center transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:border-4 hover:border-green-950 relative plan">
                <h2 class="text-3xl font-semibold mb-4 text-green-950">{{ $plan['name'] }}</h2>
                <p class="text-xl text-gray-700 mb-6">${{ number_format($plan['price'], 2) }}</p>
                <a href="{{ route('premium.payment', $plan['id']) }}" class="bg-green-950 text-white px-6 py-3 rounded-full hover:bg-green-900 transition-all duration-300 ease-in-out">Select</a>
            </div>
            @endforeach
        </div>

        <div class="mt-24"></div>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.plan a').click(function () {
            $('span:first').text('Step 2/2');
            $('.w-full.bg-gray-200 .bg-green-950').css('width', '100%');
        });
    });
</script>
@endsection
