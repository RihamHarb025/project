@extends('layouts.main')

@section('content')
    <section class="w-full bg-orange-50 h-auto py-20 relative flex justify-center items-center">
        <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-lg border border-gray-200">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <h2 class="text-4xl text-green-950 text-center font-bold mb-6">Welcome to Tasty Nest!</h2>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="name" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-zinc-950" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- username -->
                <div>
                    <x-input-label for="username" :value="__('Username')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="username" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-zinc-950" 
                        type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="Enter your username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-6">
                    <x-input-label for="email" :value="__('Email')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-zinc-950" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <x-input-label for="password" :value="__('Password')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-zinc-950" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 placeholder-zinc-950" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Bio -->
                <div class="mt-6">
                    <x-input-label for="bio" :value="__('Bio')" class="text-lg text-zinc-950 font-semibold" />
                    <textarea id="bio" name="bio" rows="4" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-zinc-950" placeholder="Tell us a little about yourself">{{ old('bio') }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <!-- Profile Image -->
                <div class="mt-6">
                    <x-input-label for="image-profile" :value="__('Profile Image')" class="text-lg text-zinc-950 font-semibold" />
                    <x-text-input id="image-profile" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white" type="file" name="image-profile" accept="image/*" />
                    <x-input-error :messages="$errors->get('image-profile')" class="mt-2" />
                </div>

                <!-- Preferences (Checkboxes for Tags) -->
                <div class="mt-6">
                    <x-input-label for="tags" :value="__('Tags')" class="text-lg text-zinc-950 font-semibold" />
                    <div class="space-y-2">
                        @foreach($tags as $tag)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox text-green-950">
                                <span class="ml-2 text-gray-700">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a class="underline text-sm text-green-950 hover:text-green-700" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="px-6 py-3 text-lg bg-green-950 text-white rounded-full hover:bg-green-800 transition duration-300 ease-in-out">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
@endsection
