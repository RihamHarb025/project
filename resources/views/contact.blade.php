@extends('layouts.main')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-[url('/images/bg-leaves.png')] bg-cover">
    <div class="bg-white bg-opacity-90 p-10 rounded-2xl shadow-lg w-full max-w-2xl">
        <h1 class="text-4xl font-bold text-center text-green-800 mb-2">Contact Us</h1>
        <p class="text-center text-gray-600 mb-6">Have questions or feedback? We'd love to hear from you.</p>
        
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1">Your Name:</label>
                <input type="text" name="name" required class="w-full border p-2 rounded" />
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Your Email:</label>
                <input type="email" name="email" required class="w-full border p-2 rounded" />
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Message:</label>
                <textarea name="message" rows="5" required class="w-full border p-2 rounded"></textarea>
            </div>

            <button type="submit" class="w-full bg-green-800 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Send Message
            </button>
        </form>
    </div>
</div>
 
@endsection