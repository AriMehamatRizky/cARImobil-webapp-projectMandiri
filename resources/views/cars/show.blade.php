<x-app-layout>

    <div class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex text-sm font-medium text-gray-500 space-x-2">
                <a href="{{ route('home') }}" class="hover:text-brand-orange transition">Home</a>
                <span>/</span>
                <a href="{{ route('cars.index') }}" class="hover:text-brand-orange transition">Mobil</a>
                <span>/</span>
                <span class="text-brand-dark">{{ $car->brand->name }}</span>
                <span>/</span>
                <span class="text-gray-900 font-bold truncate">{{ $car->model }}</span>
            </nav>
        </div>
    </div>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('status'))
                <div
                    class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div
                    class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 space-y-8">

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 p-1">
                        <div class="splide splide-detail-main mb-2 rounded-xl overflow-hidden">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($car->getCarouselImages() as $imagePath)
                                        <li class="splide__slide">
                                            <img src="{{ Storage::url($imagePath) }}"
                                                class="w-full h-auto object-cover aspect-[16/9]"
                                                alt="{{ $car->model }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="splide splide-detail-thumbnail px-1 pb-1">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($car->getCarouselImages() as $imagePath)
                                        <li
                                            class="splide__slide opacity-50 hover:opacity-100 transition-opacity cursor-pointer rounded-lg overflow-hidden border border-transparent hover:border-brand-orange">
                                            <img src="{{ Storage::url($imagePath) }}" class="w-full h-full object-cover"
                                                alt="Thumbnail">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <h3 class="text-xl font-bold text-brand-dark mb-6 border-l-4 border-brand-orange pl-4">Deskripsi
                            & Kondisi</h3>
                        <div class="prose max-w-none text-gray-600 leading-relaxed">
                            <p>{{ $car->description }}</p>
                        </div>

                        <div class="mt-10 pt-10 border-t border-gray-100">
                            <h3 class="text-xl font-bold text-brand-dark mb-6 border-l-4 border-brand-orange pl-4">
                                Spesifikasi Lengkap</h3>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Merek</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->brand->name }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Tahun</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->year }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Transmisi</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->transmission }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Mesin</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->engine_capacity }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-green-50 text-green-500 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Kilometer</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->mileage }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Warna</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->color }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full {{ $car->condition == 'Baru' ? 'bg-brand-orange text-white' : 'bg-gray-700 text-white' }} flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Kondisi</p>
                                    <p class="text-sm font-bold text-brand-dark mt-1">{{ $car->condition }}</p>
                                </div>

                                <div
                                    class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-md transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full {{ $car->stock > 0 ? 'bg-teal-50 text-teal-500' : 'bg-red-50 text-red-500' }} flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Status</p>
                                    <p
                                        class="text-sm font-bold {{ $car->stock > 0 ? 'text-teal-600' : 'text-red-600' }} mt-1">
                                        {{ $car->stock > 0 ? 'Tersedia' : 'Habis' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 relative">

                    <div class="sticky top-24 space-y-6">

                        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

                            <div class="p-6 relative">
                                <div class="absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>

                                <p class="text-sm text-gray-500 font-medium mb-1">{{ $car->brand->name }}</p>
                                <h1 class="text-2xl md:text-3xl font-extrabold text-brand-dark leading-tight mb-4">
                                    {{ $car->model }}
                                </h1>

                                <div class="mb-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Harga Cash
                                            </p>
                                            <p class="text-4xl font-black text-brand-orange">
                                                {{ $car->formatted_price }}
                                            </p>
                                        </div>

                                        <div>
                                            @if ($car->stock > 0)
                                                <span
                                                    class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full border border-green-200">
                                                    Tersedia: {{ $car->stock }}
                                                </span>
                                            @else
                                                <span
                                                    class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full border border-red-200">
                                                    Habis
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-400 mt-1">* Harga dapat berubah sewaktu-waktu</p>
                                </div>

                                @php
                                    $waMessage = urlencode(
                                        "Halo, saya tertarik dengan {$car->brand->name} {$car->model}. Apakah unit masih tersedia?",
                                    );
                                    $waLink = "https://wa.me/6281234567890?text={$waMessage}";
                                @endphp

                                @if ($car->stock > 0)
                                    <a href="{{ $waLink }}" target="_blank"
                                        class="flex items-center justify-center w-full py-4 bg-green-500 hover:bg-green-600 text-white rounded-xl font-bold text-lg shadow-lg shadow-green-200 transition-all transform hover:-translate-y-1 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35"
                                            height="35" viewBox="0 0 48 48">
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
                                        Hubungi Penjual
                                    </a>
                                @else
                                    <button disabled
                                        class="flex items-center justify-center w-full py-4 bg-gray-300 text-gray-500 rounded-xl font-bold text-lg cursor-not-allowed mb-4">
                                        Stok Habis
                                    </button>
                                @endif

                                <div class="grid grid-cols-2 gap-3">
                                    <form action="{{ route('wishlist.toggle', $car) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-3 flex flex-col items-center justify-center bg-gray-50 hover:bg-red-50 text-gray-600 hover:text-red-500 rounded-xl border border-gray-200 transition-colors group">
                                            <svg class="w-6 h-6 mb-1 {{ Auth::check() && Auth::user()->hasInWishlist($car) ? 'fill-current text-red-500' : 'fill-none' }}"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                            </svg>
                                            <span class="text-xs font-bold">Wishlist</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('compare.add', $car) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-3 flex flex-col items-center justify-center bg-gray-50 hover:bg-blue-50 text-gray-600 hover:text-blue-600 rounded-xl border border-gray-200 transition-colors">
                                            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                </path>
                                            </svg>
                                            <span class="text-xs font-bold">Bandingkan</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-5 border-t border-gray-100 flex items-center gap-4">
                                <div
                                    class="h-12 w-12 rounded-full bg-brand-dark flex items-center justify-center text-white font-bold text-xl shadow-md">
                                    CM
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">Dijual oleh</p>
                                    <p class="font-bold text-brand-dark text-lg">cARImobil Official</p>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="text-xs font-bold text-gray-700 ml-1">4.9</span>
                                        <span
                                            class="text-xs text-green-600 ml-1 bg-green-100 px-1.5 rounded flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Verified
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @if ($relatedCars->count())
                <div class="mt-20 border-t border-gray-200 pt-12">
                    <h2 class="text-2xl font-bold text-brand-dark mb-8">Mobil Sejenis Lainnya</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($relatedCars as $relatedCar)
                            <x-car-card :car="$relatedCar" />
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
