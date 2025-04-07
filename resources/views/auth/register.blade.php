@extends('layouts.main')

@section('content')
<section class="w-full bg-gradient-to-b from-orange-50 to-white py-20 flex justify-center items-center min-h-screen relative">
    <div class="w-full max-w-2xl bg-white/80 backdrop-blur-md p-10 rounded-3xl shadow-2xl border border-orange-100">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <h2 class="text-4xl text-center font-extrabold text-green-950 mb-6 tracking-wide">Welcome to Tasty Nest! 🍽️</h2>

            <!-- Name -->
            <div>
                <x-input-label for="name" value="Name" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="name" name="name" :value="old('name')" required autofocus
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="Enter your full name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" value="Username" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="username" name="username" :value="old('username')" required
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="Choose a username" />
                <x-input-error :messages="$errors->get('username')" class="mt-1" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="email" name="email" :value="old('email')" required
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" value="Password" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="password" name="password" type="password" required
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="Create a secure password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="Retype your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Bio -->
            <div>
                <x-input-label for="bio" value="Bio" class="text-lg font-semibold text-zinc-800" />
                <textarea id="bio" name="bio" rows="4"
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                    placeholder="Tell us about yourself...">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-1" />
            </div>

            <!-- Profile Image -->
            <div>
                <x-input-label for="image-profile" value="Profile Image" class="text-lg font-semibold text-zinc-800" />
                <x-text-input id="image-profile" type="file" name="image-profile" accept="image/*"
                    class="mt-2 w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400" />
                <x-input-error :messages="$errors->get('image-profile')" class="mt-1" />
            </div>

            <!-- Tags -->
            <div>
                <x-input-label for="tags" value="Your Food Interests 🍲" class="text-lg font-semibold text-zinc-800" />
                <div class="mt-2 flex flex-wrap gap-3">
                    @foreach($tags as $tag)
                        <label class="flex items-center gap-2 px-3 py-1.5 border border-orange-200 rounded-full bg-orange-100 hover:bg-orange-200 cursor-pointer transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox accent-orange-500">
                            <span class="text-sm text-gray-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('tags')" class="mt-1" />
            </div>

            <!-- Footer -->
            <div class="flex flex-col md:flex-row items-center justify-between mt-8 gap-4">
                <a class="text-sm text-green-950 hover:text-green-800 underline" href="{{ route('login') }}">
                    Already have an account?
                </a>

                <x-primary-button class="px-6 py-3 text-lg bg-green-950 text-white rounded-full hover:bg-green-800 transition-all duration-300 ease-in-out">
                    Register
                </x-primary-button>
            </div>
        </form>
    </div>
</section>
@endsection
