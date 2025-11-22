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
                        $waLink = "https://wa.me/6281276988902?text={$waMessage}"; // Ganti dengan nomor WA Admin
                    @endphp
                    <a href="{{ $waLink }}" target="_blank"
                        class="w-full flex items-center justify-center bg-green-500 text-white px-6 py-3 rounded-md font-semibold text-lg hover:bg-green-600 transition duration-150 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                            viewBox="0 0 48 48">
                            <path fill="#fff"
                                d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                            </path>
                            <path fill="#fff"
                                d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                            </path>
                            <path fill="#cfd8dc"
                                d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                            </path>
                            <path fill="#40c351"
                                d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                            </path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                clip-rule="evenodd"></path>
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
