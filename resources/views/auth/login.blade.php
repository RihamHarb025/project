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
</style>

<section class="page-wrapper w-full bg-green-50 py-20 flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl grid grid-cols-1 md:grid-cols-2 overflow-hidden min-h-[600px]">
        
        <!-- Welcome Section -->
        <div class="bg-[url('{{ asset('imgs/basilBg.png') }}')] bg-cover bg-center flex items-center justify-center p-6 sm:p-8 md:p-12">
            <div class="bg-white/70 p-6 sm:p-8 rounded-xl shadow-xl text-center max-w-md">
                <h2 class="text-3xl sm:text-4xl md:text-5xl text-green-950 mb-4 sm:mb-6 font-serif font-bold leading-snug">Welcome Back</h2>
                <p class="text-green-900 text-base sm:text-lg md:text-xl font-medium">
                    We’re so happy to have you back. Let’s get you back to where you left off!
                </p>
            </div>
        </div>

        <!-- Login Form -->
        <div class="p-6 sm:p-8 md:p-12 flex items-center justify-center">
            <form method="POST" action="{{ route('login') }}" class="space-y-6 w-full max-w-md">
                @csrf

                <h2 class="text-2xl sm:text-3xl font-bold text-green-950 mb-4 sm:mb-6 text-center">Log In</h2>

                <div>
                    <x-input-label for="email" value="Email" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="email" name="email" type="email" required autofocus
                        class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                        placeholder="you@example.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="relative">
                    <x-input-label for="password" value="Password" class="text-sm font-semibold text-gray-700" />
                    <div class="relative">
                        <x-text-input id="password" name="password" type="password" required
                            class="mt-1 block w-full pr-12 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 placeholder:text-zinc-400"
                            placeholder="Enter your password" />
                        <button type="button" id="togglePassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-800 text-lg">
                            <i class="fa-solid fa-eye text-green-900 hover:text-green-950" id="eyeIcon"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button class="bg-green-900 text-orange-300 hover:bg-green-950 px-6 py-3 w-full text-center">
                        Log In
                    </x-primary-button>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between mt-8 gap-4 text-center">
                    <a href="{{ route('register') }}" class="transition-link text-green-900 font-bold hover:text-green-950 hover:underline transition-all duration-300 ease-in-out">
                        New user? Register
                    </a>
                    <a href="{{ route('password.request') }}" class="transition-link text-green-900 font-bold hover:text-green-950 hover:underline transition-all duration-300 ease-in-out">
                        Forgot Password
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#togglePassword').on('click', function () {
            const passwordInput = $('#password');
            const eyeIcon = $('#eyeIcon');
            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
            eyeIcon.toggleClass('fa-eye fa-eye-slash');
        });

        $('.page-wrapper').addClass('page-enter page-enter-active');

        $('.transition-link').on('click', function (e) {
            e.preventDefault();
            const targetUrl = $(this).attr('href');
            $('.page-wrapper').removeClass('page-enter page-enter-active').addClass('page-exit page-exit-active');
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 700);
        });
    });
</script>
@endsection
