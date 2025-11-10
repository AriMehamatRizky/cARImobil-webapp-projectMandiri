<div
    class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out">

    <div class="splide splide-card" role="group" aria-label="Foto {{ $car->brand->name }} {{ $car->model }}">
        <div class="splide__track">
            <ul class="splide__list">
                @forelse($car->getCarouselImages() as $imagePath)
                    <li class="splide__slide">
                        <a href="{{ route('cars.show', $car->slug) }}">
                            <img src="{{ Storage::url($imagePath) }}"
                                alt="Foto {{ $car->brand->name }} {{ $car->model }}" class="h-56 w-full object-cover">
                        </a>
                    </li>
                @empty
                    <li class="splide__slide">
                        <a href="{{ route('cars.show', $car->slug) }}">
                            <img src="https://via.placeholder.com/400x224.png?text=cARImobil"
                                alt="Gambar tidak tersedia" class="h-56 w-full object-cover">
                        </a>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="p-5 flex flex-col flex-grow">
        <div>
            <span
                class="inline-block bg-brand-orange bg-opacity-10 text-brand-orange text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase">
                {{ $car->condition }}
            </span>
            <h3 class="mt-3 text-xl font-bold text-brand-dark hover:text-brand-orange transition duration-150">
                <a href="{{ route('cars.show', $car->slug) }}">{{ $car->brand->name }} {{ $car->model }}</a>
            </h3>
            <p class="text-sm text-gray-500 mt-1">{{ $car->year }} • {{ $car->transmission }} •
                {{ $car->mileage }}</p>
        </div>

        <div class="mt-4">
            <span class="text-2xl font-extrabold text-brand-dark">Rp
                {{ number_format($car->price, 0, ',', '.') }}</span>
        </div>

        <div class="mt-5 pt-4 border-t border-gray-100 flex-grow flex items-end">
            <a href="{{ route('cars.show', $car->slug) }}"
                class="w-full text-center block bg-brand-dark text-white px-4 py-2.5 rounded-md font-semibold hover:bg-opacity-80 transition duration-150 ease-in-out">
                Lihat Detail
            </a>
        </div>
    </div>
</div>
