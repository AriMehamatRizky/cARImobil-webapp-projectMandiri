<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'cARImobil') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Scrollbar agar tidak merusak estetika */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: #F47B20;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #d9650e;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="fixed inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&w=1920&auto=format&fit=crop"
            class="w-full h-full object-cover filter blur-[2px] scale-105" alt="Background Mobil">

        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 via-brand-dark/80 to-gray-900/90"></div>

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-brand-orange rounded-full blur-[150px] opacity-10">
        </div>
    </div>

    <div class="relative z-10 min-h-screen flex flex-col items-center pt-16 sm:pt-24 pb-12 px-4">

        <div class="mb-10 transition-transform hover:scale-105 duration-500 ease-out">
            <a href="/" class="block relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-brand-orange to-orange-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
                </div>
                <img src="{{ asset('img/logocARImobil.png') }}"
                    class="relative w-28 h-28 rounded-full border-4 border-white/10 shadow-2xl" alt="Logo">
            </a>
        </div>

        <div
            class="w-full sm:max-w-[450px] bg-white/10 backdrop-blur-xl border border-white/20 shadow-[0_8px_32px_0_rgba(0,0,0,0.37)] rounded-3xl overflow-hidden relative">

            <div
                class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-brand-orange to-transparent opacity-80">
            </div>

            <div class="px-8 py-10">
                <div class="text-white/90">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="mt-12 text-white/40 text-xs font-medium tracking-wider uppercase">
            &copy; {{ date('Y') }} cARImobil Corp.
        </div>
    </div>

</body>

</html>
