@extends('layouts.main')

@section('content')
    <section class="w-full bg-orange-50 h-auto py-20 relative flex justify-center items-center">
        <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-lg border border-gray-200">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2 class="text-4xl text-green-950 text-center font-bold mb-6">Create Your Account</h2>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-lg text-green-950 font-semibold" />
                    <x-text-input id="name" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-gray-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- <div>
                    <x-input-label for="username" :value="__('Username')" class="text-lg text-green-950 font-semibold" />
                    <x-text-input id="username" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-gray-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div> -->

                <!-- Email Address -->
                <div class="mt-6">
                    <x-input-label for="email" :value="__('Email')" class="text-lg text-green-950 font-semibold" />
                    <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-gray-400" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <x-input-label for="password" :value="__('Password')" class="text-lg text-green-950 font-semibold" />
                    <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 bg-white placeholder-gray-400" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg text-green-950 font-semibold" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-900 placeholder-gray-400" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
