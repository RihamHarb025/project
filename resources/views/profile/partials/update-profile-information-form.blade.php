<section>
<header>
    <h2 class="text-lg font-semibold text-green-950">
        {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-green-900">
        {{ __("Update your account's profile information and email address.") }}
    </p>
</header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-800 focus:border-green-950 focus:ring-2 focus:ring-green-950" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-800 focus:border-green-950 focus:ring-2 focus:ring-green-950" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-white dark:text-gray-400 bg-green-900 hover: bh-green-950 text-gray-900 dark:hover:text-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="bio" :value="__('bio')"/>
            <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-800 focus:border-green-950 focus:ring-2 focus:ring-green-950" :value="old('bio', $user->bio)" required autofocus autocomplete="bio" />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
