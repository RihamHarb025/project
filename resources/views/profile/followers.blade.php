@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto mt-16 p-8 bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl">
    <h2 class="text-4xl font-extrabold text-green-900 mb-6">{{ $user->name }}'s Followers</h2>

    @if($followers->count() > 0)
        <ul class="space-y-4">
            @foreach($followers as $follower)
                <li class="flex items-center justify-between p-4 border border-gray-300 rounded-xl bg-white shadow hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4">
                        <img src="{{ $follower->profile_picture ?? asset('imgs/default-avatar.png') }}" 
                             class="w-12 h-12 rounded-full border border-green-400 shadow-sm object-cover" 
                             alt="{{ $follower->name }}'s Avatar">
                        <span class="text-lg font-semibold text-gray-900">{{ $follower->name }}</span>
                    </div>

                    <a href="{{ route('users.show', $follower->id) }}"
                       class="text-sm text-white bg-green-900 px-4 py-1.5 rounded-md hover:bg-green-950 transition">
                        View Profile
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-800 text-lg font-medium">No followers yet!</p>
    @endif
</section>
@endsection
