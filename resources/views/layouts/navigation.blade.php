<nav x-data="{ open: false }" class="bg-zinc-900 border-b border-gray-100 text-white">
    <!-- Primary Navigation Menu -->
    <div class="px-4">
        <div class="flex justify-between text-white">
            <!-- Site logo & navigation -->
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center w-auto justify-center text-white">
                    <a href="{{ route('home') }}">
                        <div class="flex items-center justify-center text-white font-sans" style="font-size: 5rem">&#x1D53D;</div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex space-x-8 justify-center items-center mx-5">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center relative">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border text-sm font-medium
                                     text-gray-200 hover:text-gray-400 transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>