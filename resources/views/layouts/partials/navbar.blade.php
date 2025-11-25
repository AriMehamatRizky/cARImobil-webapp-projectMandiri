<nav x-data="{ open: false }" class="bg-brand-dark sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logocARImobil.png') }}" alt="cARImobil Logo" class="h-14 w-auto rounded-full">
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('home') }}"
                    class="text-gray-300 hover:text-white inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('home') ? 'text-white border-b-2 border-brand-orange' : '' }}">
                    Home
                </a>
                <a href="{{ route('cars.index') }}"
                    class="text-gray-300 hover:text-white inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('cars.index') ? 'text-white border-b-2 border-brand-orange' : '' }}">
                    Daftar Mobil
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @guest
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-300 hover:text-white transition duration-150 ease-in-out">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-brand-orange hover:bg-opacity-90 transition duration-150 ease-in-out">
                        Register
                    </a>
                @endguest

                @auth

                    <a href="{{ route('compare.index') }}"
                        class="relative p-1 rounded-full text-gray-300 hover:text-white focus:outline-none transition duration-150 mr-4 group"
                        title="Bandingkan Mobil">
                        <span class="sr-only">Bandingkan</span>

                        <svg class="h-6 w-6 group-hover:text-brand-orange transition-colors"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                        </svg>

                        @php
                            $compareCount = count(session('compare.cars', []));
                        @endphp

                        @if ($compareCount > 0)
                            <span
                                class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold leading-none text-white transform bg-brand-orange rounded-full shadow-sm border border-brand-dark">
                                {{ $compareCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('wishlist.index') }}"
                        class="p-1 rounded-full text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-brand-dark focus:ring-white">
                        <span class="sr-only">Wishlist</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                @if (Auth::user()->avatar)
                                    <img class="h-8 w-8 rounded-full object-cover mr-2 border border-gray-300"
                                        src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <div
                                        class="h-8 w-8 rounded-full bg-brand-orange text-white flex items-center justify-center mr-2 font-bold text-sm shadow-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif

                                <div class="font-semibold">{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>

                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>
                            @if (Auth::user()->is_admin)
                                <x-dropdown-link :href="route('admin.dashboard')">Admin Dashboard</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}"
                class="text-gray-300 hover:text-white hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-gray-900 text-white' : '' }}">Home</a>
            <a href="{{ route('cars.index') }}"
                class="text-gray-300 hover:text-white hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('cars.index') ? 'bg-gray-900 text-white' : '' }}">Daftar
                Mobil</a>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-700">
            @auth
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        @if (Auth::user()->avatar)
                            <img class="h-10 w-10 rounded-full object-cover border border-gray-500"
                                src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                        @else
                            <div
                                class="h-10 w-10 rounded-full bg-brand-orange text-white flex items-center justify-center font-bold text-lg border border-gray-500">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="ms-3">
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                    </div>

                    <a href="{{ route('compare.index') }}"
                        class="relative ml-auto flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">Bandingkan</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                        </svg>

                        @if ($compareCount > 0)
                            <span
                                class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-brand-orange ring-2 ring-brand-dark"></span>
                        @endif
                    </a>

                    <a href="{{ route('wishlist.index') }}"
                        class="ms-auto flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white">
                        <span class="sr-only">Wishlist</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </a>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Profil</a>
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Admin
                            Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">
                            Log Out
                        </a>
                    </form>
                </div>
            @else
                <div class="px-2 space-y-1">
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Login</a>
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
