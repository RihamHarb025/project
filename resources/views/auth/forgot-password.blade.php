@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    {{ __('Forgot your password?') }}
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="space-y-4">
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            type="email"
                            name="email"
                            autocomplete="email"
                            required
                            :value="old('email')"
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <x-primary-button class="w-full py-3 text-lg font-semibold">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
