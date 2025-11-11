<x-app-layout>
    <section class="relative h-[60vh] md:h-[80vh] bg-brand-dark text-white flex items-center justify-center text-center">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40"
            style="background-image: url('https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold tracking-tight drop-shadow-lg">
                Temukan Mobil <span class="text-brand-orange">Impianmu</span>
            </h1>
            <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto drop-shadow-md">
                Platform terbaik untuk mencari dan membandingkan mobil baru dan bekas di Indonesia.
            </p>
            <div class="mt-10">
                <a href="{{ route('cars.index') }}"
                    class="inline-block bg-brand-orange text-white font-bold text-lg px-8 py-3 rounded-md shadow-lg 
                          hover:bg-opacity-90 transform hover:-translate-y-1 transition-all duration-300 ease-in-out">
                    Mulai Mencari
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-brand-light-gray">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-brand-dark mb-10">Baru Ditambahkan</h2>

            @if ($popularCars->count())
                <div classsection="splide splide-main" role="group" aria-label="Mobil Populer">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($popularCars as $car)
                                <li class="splide__slide">
                                    <x-car-card :car="$car" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada mobil populer untuk ditampilkan.</p>
            @endif
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-brand-dark mb-10">Telusuri Berdasarkan Merek</h2>

            @if ($brands->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-5">
                    @foreach ($brands as $brand)
                        <a href="{{ route('cars.index', ['brand' => $brand->slug]) }}"
                            class="block bg-white p-6 rounded-lg shadow-md text-center group
                                  border border-gray-200 hover:shadow-xl hover:border-brand-orange 
                                  hover:bg-brand-orange transition-all duration-300 ease-in-out">
                            <span class="text-lg font-semibold text-brand-dark group-hover:text-white">
                                {{ $brand->name }}
                            </span>
                            <span class="block text-sm text-gray-500 group-hover:text-white mt-1">
                                ({{ $brand->cars_count }} unit)
                            </span>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada merek untuk ditampilkan.</p>
            @endif
        </div>
    </section>
</x-app-layout>
