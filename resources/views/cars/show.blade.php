<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if (session('status'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

                <div class="lg:col-span-3 p-6">
                    <div id="splide-detail-main"
                        class="splide splide-detail-main mb-4 rounded-lg overflow-hidden shadow-lg">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($car->getCarouselImages() as $imagePath)
                                    <li class="splide__slide">
                                        <img src="{{ Storage::url($imagePath) }}"
                                            alt="Foto {{ $car->brand->name }} {{ $car->model }}"
                                            class="w-full h-auto object-cover aspect-video">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div id="splide-detail-thumbnail" class="splide splide-detail-thumbnail">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($car->getCarouselImages() as $imagePath)
                                    <li class="splide__slide">
                                        <img src="{{ Storage::url($imagePath) }}"
                                            alt="Thumbnail {{ $car->brand->name }} {{ $car->model }}"
                                            class="w-full h-full object-cover rounded-md cursor-pointer">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 p-6 pr-8">
                    <span
                        class="inline-block bg-brand-orange bg-opacity-10 text-brand-orange text-sm font-semibold px-3 py-1 rounded-full uppercase tracking-wider">
                        {{ $car->condition }}
                    </span>
                    <h1 class="text-4xl font-bold text-brand-dark mt-3">{{ $car->brand->name }} {{ $car->model }}
                    </h1>
                    <p class="text-xl text-gray-500 font-light">{{ $car->year }}</p>

                    <div class="my-6">
                        <span class="text-4xl font-extrabold text-brand-dark">Rp
                            {{ number_format($car->price, 0, ',', '.') }}</span>
                    </div>

                    @php
                        // Buat pesan WA
                        $waMessage = urlencode(
                            "Halo cARImobil, saya tertarik dengan mobil {$car->brand->name} {$car->model} tahun {$car->year} (Harga: Rp " .
                                number_format($car->price, 0, ',', '.') .
                                '). Apakah unit masih tersedia?',
                        );
                        $waLink = "https://wa.me/6281234567890?text={$waMessage}"; // Ganti dengan nomor WA Admin
                    @endphp
                    <a href="{{ $waLink }}" target="_blank"
                        class="w-full flex items-center justify-center bg-green-500 text-white px-6 py-3 rounded-md font-semibold text-lg hover:bg-green-600 transition duration-150 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448L.057 24zM7.171 6.591c.101-.39 1.011-1.348 1.497-1.488.486-.14 1.026-.135 1.556.12.53.255 1.743 2.037 1.884 2.182.14.145.232.34.101.53-.131.19-.232.34-.413.53-.18.19-.36.205-.539.34-.179.135-.369.319-.51.488-.141.17-.282.34-.131.63.15.289.691 1.251 1.483 1.963.982.923 1.838 1.23 2.09 1.378.252.148.4.13.56.015.161-.115.699-.81 1.011-1.085.312-.275.6-.365.882-.205.282.159 1.84 1.406 2.152 1.64.312.234.5.34.56.41.061.07 0 .375-.081.715-.081.34-.51.6-1.05.82-1.218.51-2.438.315-3.482-.315-1.044-.63-2.06-1.52-2.942-2.583-.882-1.063-1.615-2.267-2.09-3.554-.473-1.287-.4-2.438.12-3.313z" />
                        </svg>
                        Hubungi via WhatsApp
                    </a>

                    <div class="flex flex-col sm:flex-row gap-4 mt-4">
                        <form action="{{ route('wishlist.toggle', $car) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center bg-gray-100 text-brand-dark px-6 py-3 rounded-md font-semibold hover:bg-gray-200 transition duration-150 border border-gray-300">
                                <svg class="w-5 h-5 mr-2 @auth @if (Auth::user()->hasInWishlist($car)) text-red-500 fill-current @endif @endauth"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                @auth
                                    {{ Auth::user()->hasInWishlist($car) ? 'Hapus Wishlist' : 'Tambah Wishlist' }}
                                @else
                                    Tambah Wishlist
                                @endauth
                            </button>
                        </form>

                        <form action="{{ route('compare.add', $car) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center bg-brand-dark text-white px-6 py-3 rounded-md font-semibold hover:bg-opacity-80 transition duration-150">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                </svg>
                                Bandingkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-8 border-t border-gray-100">
                <h3 class="text-2xl font-bold text-brand-dark mb-6">Detail & Spesifikasi</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <ul class="divide-y divide-gray-200">
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Merek</span><span
                                    class="font-semibold text-brand-dark">{{ $car->brand->name }}</span></li>
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Model</span><span
                                    class="font-semibold text-brand-dark">{{ $car->model }}</span></li>
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Tahun</span><span
                                    class="font-semibold text-brand-dark">{{ $car->year }}</span></li>
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Transmisi</span><span
                                    class="font-semibold text-brand-dark">{{ $car->transmission }}</span></li>
                            <li class="py-4 flex justify-between"><span class="text-gray-500 font-medium">Kapasitas
                                    Mesin</span><span
                                    class="font-semibold text-brand-dark">{{ $car->engine_capacity }}</span></li>
                            <li class="py-4 flex justify-between"><span class="text-gray-500 font-medium">Jarak
                                    Tempuh</span><span class="font-semibold text-brand-dark">{{ $car->mileage }}</span>
                            </li>
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Warna</span><span
                                    class="font-semibold text-brand-dark">{{ $car->color }}</span></li>
                            <li class="py-4 flex justify-between"><span
                                    class="text-gray-500 font-medium">Kondisi</span><span
                                    class="font-semibold text-brand-dark">{{ $car->condition }}</span></li>
                        </ul>
                    </div>

                    <div class="prose prose-lg text-gray-600 leading-relaxed">
                        <h4 class="text-xl font-semibold text-brand-dark mb-2">Deskripsi Penjual</h4>
                        <p>
                            {{ $car->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if ($relatedCars->count())
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-center text-brand-dark mb-10">Mobil Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedCars as $relatedCar)
                        <x-car-card :car="$relatedCar" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
