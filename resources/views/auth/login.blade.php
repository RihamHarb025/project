<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50 px-4">
        <!-- Main container -->
        <div class="w-full max-w-6xl h-[600px] bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Left side (welcome message) -->
            <div class="bg-cover bg-center p-12 flex flex-col justify-center"
                style="background-image: url('{{ asset('imgs/basilBg.png') }}')">
                <div class="bg-white/70 p-8 rounded-lg shadow-lg">
                    <h2 class="text-5xl text-green-950 mb-6 leading-tight font-serif font-bold">
                        Welcome Back
                    </h2>
                    <p class="text-green-900 text-2xl font-semibold">
                        Log in to share your favorite recipes, discover new dishes, and cook up something magical.
                    </p>
                </div>
            </div>

            <!-- Right side (login form) -->
            <div class="bg-white p-12 flex flex-col justify-between items-center">
                <form method="POST" action="{{ route('login') }}" class="w-full max-w-md space-y-6">
                    @csrf

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-green-700 hover:text-green-900 transition duration-200 ease-in-out underline" href="{{ route('password.request') }}">
                                Forgot password?
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

                <!-- Sign up link -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">
                        New user?
                        <a href="{{ route('register') }}" 
                           class="ml-1 text-green-900 font-bold hover:text-green-950 hover:underline transition-all duration-300 ease-in-out">
                            Create an account
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>