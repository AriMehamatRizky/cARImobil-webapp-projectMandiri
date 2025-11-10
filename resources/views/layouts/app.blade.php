<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-t">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'cARImobil') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Style untuk Splide pagination dots agar matching */
        .splide__pagination__page.is-active {
            background: #F47B20 !important;
        }

        .splide__arrow {
            background: rgba(46, 46, 46, 0.7) !important;
        }

        .splide__arrow svg {
            fill: #FFF !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-brand-light-gray">
    <div class="min-h-screen flex flex-col">

        @include('layouts.partials.navbar')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="flex-grow">
            {{ $slot }}
        </main>

        @include('layouts.partials.footer')
    </div>
</body>

</html>
