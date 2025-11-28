<nav x-data="{ open: false, searchOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'bg-[#1a1a1a]/95 backdrop-blur-md shadow-lg' : 'bg-[#1a1a1a]'"
    class="sticky top-0 z-50 transition-all duration-300 border-b border-white/5">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="relative">
                        <div
                            class="absolute -inset-1 bg-brand-orange rounded-full opacity-0 group-hover:opacity-50 blur transition duration-500">
                        </div>
                        <img src="{{ asset('img/logocARImobil.png') }}" alt="Logo"
                            class="relative h-10 w-10 rounded-full border-2 border-white/10">
                    </div>
                    <span class="text-2xl font-bold text-white tracking-tight">c<span
                            class="text-brand-orange">ARI</span>mobil</span>
                </a>
            </div>

            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}"
                    class="relative group py-2 text-base font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-white' : 'text-gray-400 hover:text-white' }}">
                    Home
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-brand-orange transform origin-left transition-transform duration-300 ease-out {{ request()->routeIs('home') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                </a>

                <a href="{{ route('cars.index') }}"
                    class="relative group py-2 text-base font-medium transition-colors duration-300 {{ request()->routeIs('cars.*') ? 'text-white' : 'text-gray-400 hover:text-white' }}">
                    Daftar Mobil
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-brand-orange transform origin-left transition-transform duration-300 ease-out {{ request()->routeIs('cars.*') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-5">

                <div class="relative">
                    <button @click="searchOpen = !searchOpen"
                        class="text-gray-400 hover:text-white transition-colors focus:outline-none mt-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <div x-show="searchOpen" @click.away="searchOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="absolute right-0 top-10 w-72 bg-white rounded-xl shadow-xl p-2 z-50"
                        style="display: none;">
                        <form action="{{ route('cars.index') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" placeholder="Cari Toyota, Honda..."
                                class="w-full border-none text-gray-800 placeholder-gray-400 focus:ring-0 text-sm bg-transparent h-10 px-2">
                            <button type="submit"
                                class="bg-brand-orange text-white p-2 rounded-lg hover:bg-orange-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="h-6 w-px bg-white/10"></div>

                @guest
                    <a href="{{ route('login') }}"
                        class="text-sm font-bold text-white hover:text-brand-orange transition-colors">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-bold text-brand-dark bg-white rounded-full hover:bg-brand-orange hover:text-white transition-all duration-300 shadow-[0_0_15px_rgba(255,255,255,0.3)] hover:shadow-[0_0_20px_rgba(244,123,32,0.6)]">
                        Daftar
                    </a>
                @endguest

                @auth
                    <a href="{{ route('wishlist.index') }}"
                        class="relative text-gray-300 hover:text-red-500 transition-colors group" title="Wishlist">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </a>

                    <a href="{{ route('compare.index') }}"
                        class="relative text-gray-300 hover:text-brand-orange transition-colors" title="Bandingkan">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        @if (count(session('compare.cars', [])) > 0)
                            <span
                                class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-brand-orange text-[10px] font-bold text-white border border-[#1a1a1a]">
                                {{ count(session('compare.cars', [])) }}
                            </span>
                        @endif
                    </a>

                    <div class="relative ml-3" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-3 focus:outline-none group">
                            <div class="text-right hidden lg:block">
                                <p class="text-sm font-bold text-white group-hover:text-brand-orange transition-colors">
                                    {{ Auth::user()->name }}</p>

                                <p class="text-[10px] text-gray-400 uppercase tracking-wider">
                                    {{ Auth::user()->is_admin ? 'Administrator' : 'Member' }}
                                </p>
                            </div>

                            @if (Auth::user()->avatar)
                                <img class="h-10 w-10 rounded-full object-cover border-2 border-white/20 group-hover:border-brand-orange transition-colors"
                                    src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                            @else
                                <div
                                    class="h-10 w-10 rounded-full bg-brand-orange text-white flex items-center justify-center font-bold border-2 border-white/10">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-2xl py-2 border border-gray-100 overflow-hidden"
                            style="display: none;">

                            <div class="px-4 py-2 border-b border-gray-100 bg-gray-50">
                                <p class="text-xs text-gray-500">Login sebagai</p>
                                <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange transition-colors">
                                Edit Profil
                            </a>

                            @if (Auth::user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange transition-colors">
                                    Dashboard Admin
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150">
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

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-[#1a1a1a] border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')"
                class="text-gray-300 hover:text-white hover:bg-white/5">
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cars.index')" :active="request()->routeIs('cars.*')"
                class="text-gray-300 hover:text-white hover:bg-white/5">
                Daftar Mobil
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-white/10">
            @auth
                <div class="px-4 flex items-center">
                    <div class="flex-shrink-0">
                        @if (Auth::user()->avatar)
                            <img class="h-10 w-10 rounded-full object-cover border border-white/30"
                                src="{{ Storage::url(Auth::user()->avatar) }}">
                        @else
                            <div
                                class="h-10 w-10 rounded-full bg-brand-orange text-white flex items-center justify-center font-bold border border-white/30">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                        <div class="text-xs text-brand-orange mt-0.5">
                            {{ Auth::user()->is_admin ? 'Administrator' : 'Member' }}
                        </div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')"
                        class="text-gray-300 hover:text-brand-orange">Profil</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('wishlist.index')"
                        class="text-gray-300 hover:text-brand-orange">Wishlist</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('compare.index')"
                        class="text-gray-300 hover:text-brand-orange">Bandingkan</x-responsive-nav-link>

                    @if (Auth::user()->is_admin)
                        <x-responsive-nav-link :href="route('admin.dashboard')" class="text-gray-300 hover:text-brand-orange">Dashboard
                            Admin</x-responsive-nav-link>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-red-400 hover:text-red-500">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1 px-4 pb-4">
                    <a href="{{ route('login') }}"
                        class="block w-full text-center px-4 py-2 text-white border border-white/20 rounded-lg hover:bg-white/10">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="block w-full text-center px-4 py-2 mt-2 bg-brand-orange text-white rounded-lg font-bold">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
