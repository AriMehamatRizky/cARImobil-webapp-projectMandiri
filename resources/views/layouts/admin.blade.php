<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - {{ config('app.name', 'cARImobil') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-brand-light-gray">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-brand-light-gray">

        <aside
            class="fixed inset-y-0 left-0 z-30 flex flex-col h-full w-64 bg-brand-dark shadow-lg transform transition-transform duration-300 ease-in-out"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'lg:translate-x-0': true }">
            <div class="flex items-center justify-center h-20 px-6 bg-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('img/logocARImobil.png') }}" alt="cARImobil Logo"
                        class="h-10 w-auto rounded-full mr-3">
                    <span class="text-2xl font-bold text-white">Admin</span>
                </a>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200
                           {{ request()->routeIs('admin.dashboard')
                               ? 'bg-brand-orange text-white'
                               : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.cars.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200
                           {{ request()->routeIs('admin.cars.*')
                               ? 'bg-brand-orange text-white'
                               : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="-1 -4 24 24">
                        <path fill="#ffffffff" 
                            d="M14.5 6.497h.5v-.139l-.071-.119l-.429.258Zm-14 0l-.429-.258L0 6.36v.138h.5Zm2.126-3.541l-.429-.258l.429.258Zm9.748 0l.429-.258l-.429.258ZM3.5 11.5V11H3v.5h.5Zm8 0h.5V11h-.5v.5ZM14 6.497V12.5h1V6.497h-1ZM.929 6.754l2.126-3.54l-.858-.516L.071 6.24l.858.515ZM5.198 2h4.604V1H5.198v1Zm6.747 1.213l2.126 3.541l.858-.515l-2.126-3.54l-.858.514ZM2.5 13h-1v1h1v-1Zm.5-1.5v1h1v-1H3ZM13.5 13h-1v1h1v-1Zm-1.5-.5v-1h-1v1h1Zm-.5-1.5h-8v1h8v-1ZM1 12.5V6.497H0V12.5h1Zm11.5.5a.5.5 0 0 1-.5-.5h-1a1.5 1.5 0 0 0 1.5 1.5v-1Zm-10 1A1.5 1.5 0 0 0 4 12.5H3a.5.5 0 0 1-.5.5v1Zm-1-1a.5.5 0 0 1-.5-.5H0A1.5 1.5 0 0 0 1.5 14v-1ZM9.802 2a2.5 2.5 0 0 1 2.143 1.213l.858-.515A3.5 3.5 0 0 0 9.802 1v1ZM3.055 3.213A2.5 2.5 0 0 1 5.198 2V1a3.5 3.5 0 0 0-3 1.698l.857.515ZM14 12.5a.5.5 0 0 1-.5.5v1a1.5 1.5 0 0 0 1.5-1.5h-1ZM2 10h3V9H2v1Zm11-1h-3v1h3V9ZM3 7h9V6H3v1Z" />
                    </svg>
                    <span>Manajemen Mobil</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200
                           {{ request()->routeIs('admin.users.*')
                               ? 'bg-brand-orange text-white'
                               : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="#303030">
                        <g fill="#f9f9f9ff" fill-rule="evenodd">
                            <path
                                d="M13.689 11.132c1.155 1.222 1.953 2.879 2.183 4.748a1.007 1.007 0 0 1-1 1.12H3.007a1.005 1.005 0 0 1-1-1.12c.23-1.87 1.028-3.526 2.183-4.748c.247.228.505.442.782.633c-1.038 1.069-1.765 2.55-1.972 4.237L14.872 16c-.204-1.686-.93-3.166-1.966-4.235a7.01 7.01 0 0 0 .783-.633M8.939 1c1.9 0 3 2 4.38 2.633a2.483 2.483 0 0 1-1.88.867c-.298 0-.579-.06-.844-.157A3.726 3.726 0 0 1 7.69 5.75c-1.395 0-3.75.25-3.245-1.903C5.94 3 6.952 1 8.94 1" />
                            <path
                                d="M8.94 2c2.205 0 4 1.794 4 4s-1.795 4-4 4c-2.207 0-4-1.794-4-4s1.793-4 4-4m0 9A5 5 0 1 0 8.937.999A5 5 0 0 0 8.94 11" />
                        </g>
                    </svg>
                    <span>Manajemen User</span>
                </a>
            </nav>

            <div class="px-4 py-4 mt-auto border-t border-gray-700">
                <a href="{{ route('home') }}" target="_blank"
                    class="flex items-center px-4 py-2.5 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    <span>Lihat Website</span>
                </a>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-50" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-50" x-transition:leave-end="opacity-0"></div>

        <div class="flex-1 flex flex-col overflow-hidden lg:ml-64">

            <header class="flex items-center justify-between h-20 px-6 bg-white shadow-md">

                <button @click.stop="sidebarOpen = !sidebarOpen"
                    class="text-gray-500 hover:text-brand-dark focus:outline-none lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-brand-dark">
                        @yield('header')
                    </h2>
                </div>

                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

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

                            <div class="border-t border-gray-100"></div>
                            <x-dropdown-link :href="route('home')">
                                {{ __('Ke Dashboard User') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
