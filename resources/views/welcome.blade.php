<x-guest-layout>
    <h1 class="flex justify-center mb-4 text-lg text-black font-extrabold">
        {{ __('Welcome to "F"!') }}
    </h1>
    <div class="mb-4 text-sm text-black">
        {{ __('To see or make any posts. You must be logged in!') }}
        <br>
        {{ __('Choose one of the following options:') }}
    </div>

    @if (Route::has('login'))
    <nav class="flex justify-center space-x-5 mt-5">
        <a href="{{ route('login') }}">
            <x-primary-button class="w-25 h-10 mx-5 flex items-center justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </a>
        <a href="{{ route('register') }}">
            <x-primary-button class="w-25 h-10 mx-5 flex items-center justify-center">
                {{ __('Register') }}
            </x-primary-button>
        </a>
    </nav>
    @endif
</x-guest-layout>
