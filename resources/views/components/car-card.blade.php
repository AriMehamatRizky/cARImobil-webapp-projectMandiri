<div
    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out">

    <div class="relative h-60 w-full overflow-hidden bg-gray-100">

        <div class="absolute top-3 left-3 z-20">
            <span
                class="inline-block px-3 py-1 text-xs font-bold tracking-wider text-white uppercase rounded-full shadow-sm
                {{ $car->condition == 'Baru' ? 'bg-brand-orange' : 'bg-gray-700' }}">
                {{ $car->condition }}
            </span>
        </div>

        <div class="splide splide-card h-full w-full">
            <div class="splide__track h-full">
                <ul class="splide__list h-full">
                    @forelse($car->getCarouselImages() as $imagePath)
                        <li class="splide__slide h-full">
                            <a href="{{ route('cars.show', $car->slug) }}" class="block h-full w-full">
                                <img src="{{ Storage::url($imagePath) }}"
                                    alt="{{ $car->brand->name }} {{ $car->model }}"
                                    class="h-full w-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            </a>
                        </li>
                    @empty
                        <li class="splide__slide h-full">
                            <img src="https://via.placeholder.com/400x300.png?text=No+Image"
                                class="h-full w-full object-cover">
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="p-5 flex flex-col flex-grow">

        <div class="mb-2">
            <p class="text-xs text-gray-500 font-medium mb-1 uppercase tracking-wide">{{ $car->year }} •
                {{ $car->transmission }}</p>
            <h3 class="text-lg font-bold text-brand-dark leading-tight group-hover:text-brand-orange transition-colors">
                <a href="{{ route('cars.show', $car->slug) }}">
                    {{ $car->brand->name }} {{ $car->model }}
                </a>
            </h3>
        </div>

        <div class="flex items-center gap-4 text-xs text-gray-400 mb-4 mt-1">
            <span class="flex items-center gap-1 bg-gray-50 px-2 py-1 rounded">
                Mesin: {{ $car->engine_capacity }}
            </span>
            <span class="flex items-center gap-1 bg-gray-50 px-2 py-1 rounded">
                KM: {{ $car->mileage }}
            </span>
        </div>

        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
            <div>
                <span class="text-xs text-gray-400 block">Harga Cash</span>
                <span class="text-xl font-extrabold text-brand-orange">
                    Rp {{ number_format($car->price / 1000000, 0) }} jt
                </span>
            </div>

            <a href="{{ route('cars.show', $car->slug) }}"
                class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-50 text-brand-dark hover:bg-brand-dark hover:text-white transition-all duration-200 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>
