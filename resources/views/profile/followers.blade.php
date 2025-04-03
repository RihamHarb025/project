@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-xl">
    <h2 class="text-3xl font-bold text-green-900">{{ $user->name }}'s Followers</h2>

    @if($followers->count() > 0)
        <ul class="space-y-4">
            @foreach($followers as $follower)
                <li class="flex justify-between items-center p-4 border border-gray-300 rounded-lg bg-white shadow">
                    <span class="text-lg font-medium">{{ $follower->name }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No followers yet!</p>
    @endif
</section>
@endsection