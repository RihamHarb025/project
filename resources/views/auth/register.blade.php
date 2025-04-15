@extends('layouts.main')

@section('content')
<style>
    .page-enter {
        transform: translateX(100%);
        opacity: 0;
    }

    .page-enter-active {
        transition: all 0.7s ease-in-out;
        transform: translateX(0%);
        opacity: 1;
    }

    .page-exit {
        transform: translateX(0%);
        opacity: 1;
    }

    .page-exit-active {
        transition: all 0.7s ease-in-out;
        transform: translateX(-100%);
        opacity: 0;
    }

    /* New Animation for Slide Back */
    .page-back-enter {
        transform: translateX(-100%);
        opacity: 0;
    }

    .page-back-enter-active {
        transition: all 0.7s ease-in-out;
        transform: translateX(0%);
        opacity: 1;
    }

    .page-back-exit {
        transform: translateX(0%);
        opacity: 1;
    }

    .page-back-exit-active {
        transition: all 0.7s ease-in-out;
        transform: translateX(100%);
        opacity: 0;
    }
</style>

<section class="page-wrapper w-full bg-green-50 py-20 flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl grid grid-cols-1 md:grid-cols-2 overflow-hidden h-auto">
        
        <!-- Right: Welcome Text (now on the right side) -->
        <div class="bg-[url('{{ asset('imgs/basilBg.png') }}')] bg-cover bg-center flex items-center justify-center p-12">
            <div class="bg-white/70 p-8 rounded-xl shadow-xl text-center max-w-md">
                <h2 class="text-5xl text-green-950 mb-6 font-serif font-bold leading-snug">Create Your Nest</h2>
                <p class="text-green-900 text-xl font-medium">
                    Discover, cook & share your favorite recipes in your own food haven.
                </p>
            </div>
        </div>

        <!-- Left: Registration Form (now on the left side) -->
        <div class="p-12 flex flex-col justify-between">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6 flex-grow">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" value="Name" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="name" name="name" :value="old('name')" required autofocus
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="Enter your full name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Username -->
                <div>
                    <x-input-label for="username" value="Username" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="username" name="username" :value="old('username')" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="Choose a username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="email" name="email" :value="old('email')" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="you@example.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" value="Password" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="password" name="password" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="Create a secure password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" value="Confirm Password" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="Retype your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <div class="mt-6">
                    <x-primary-button class="bg-green-900 text-orange-300 hover:bg-green-950 px-6 py-3 w-full">
                        Register
                    </x-primary-button>
                </div>

                <!-- Footer -->
                <div class="flex flex-col md:flex-row items-center justify-between mt-8 gap-4">
                    <a href="{{ route('login') }}" class="transition-link text-green-900 font-bold hover:text-green-950 hover:underline transition-all duration-300 ease-in-out">
                        Already have an account? Log In
                    </a>
                    <a href="{{route('redirect')}}">Sign in with Google</a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- jQuery + Slide Effect Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Initial page load animation
        $('.page-wrapper').addClass('page-enter page-enter-active');

        // Handle transition to login page
        $('.transition-link').on('click', function (e) {
            e.preventDefault();
            const targetUrl = $(this).attr('href');

            // Adding slide-back animation for login transition
            $('.page-wrapper')
                .removeClass('page-enter page-enter-active')
                .addClass('page-back-exit page-back-exit-active');

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 700); // Matches the duration of the animation
        });
    });
</script>
@endsection
