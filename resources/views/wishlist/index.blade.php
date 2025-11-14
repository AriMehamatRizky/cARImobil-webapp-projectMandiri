<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-brand-dark leading-tight">
            Wishlist Saya
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            @if($cars->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($cars as $car)
                        <x-car-card :car="$car" />
                    @endforeach
                </div>
            @else
                <div class="bg-white p-12 rounded-lg shadow-md text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <h2 class="mt-2 text-2xl font-semibold text-brand-dark">Wishlist Anda kosong</h2>
                    <p class="text-gray-500 mt-2">Mulai tambahkan mobil yang Anda sukai dari halaman daftar mobil.</p>
                    <a href="{{ route('cars.index') }}" class="mt-6 inline-block bg-brand-orange text-white px-5 py-2 rounded-md font-semibold">
                        Cari Mobil
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>