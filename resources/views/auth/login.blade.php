<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50 px-4">
        <!-- Main container (with a grid layout) -->
        <div class="w-full max-w-6xl h-[600px] bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Left side (welcome message) -->
            <div class="bg-orange-300 p-12 flex flex-col justify-center">
                <h2 class="text-5xl font-font text-green-950 mb-6 leading-tight font-serif">
                    Welcome Back
                </h2>
                <p class="text-green-900 text-2xl font-semibold">
                    Log in to share your favorite recipes, discover new dishes, and cook up something magical.
                </p>
            </div>

            <!-- Right side (login form) -->
            <div class="bg-white p-12 flex items-center">
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-700 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <x-primary-button class="w-full justify-center bg-green-900 text-orange-300 hover:bg-green-950">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
