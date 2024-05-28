<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="flex justify-center mb-4 text-lg text-black font-extrabold">
        {{ __('Log in!') }}
    </h1> 

    <div class="text-black">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-start mt-4">
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
                <a class="text-gray-600 hover:text-gray-900 ms-4" href="{{ route('register') }}">
                    {{ __('Not registered?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
