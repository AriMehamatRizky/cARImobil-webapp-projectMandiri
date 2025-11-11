<x-app-layout>
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-brand-dark">
                Daftar Mobil
            </h1>
            <p class="text-gray-500 mt-1">Temukan mobil baru dan bekas terbaik.</p>
        </div>
    </header>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <aside class="lg:col-span-1">
                <form action="{{ route('cars.index') }}" method="GET"
                    class="bg-white p-6 rounded-lg shadow-lg sticky top-28">
                    <h3 class="text-xl font-semibold mb-5 text-brand-dark border-b pb-3">Filter Pencarian</h3>

                    <div class="mb-4">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <input type="text" name="search" id="search" value="{{ $filters['search'] ?? '' }}"
                            placeholder="Cari model atau merek..."
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                        <select name="brand" id="brand"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                            <option value="">Semua Merek</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->slug }}" @selected(($filters['brand'] ?? '') == $brand->slug)>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="price_from" value="{{ $filters['price_from'] ?? '' }}"
                                placeholder="Dari (Rp)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                            <input type="number" name="price_to" value="{{ $filters['price_to'] ?? '' }}"
                                placeholder="Sampai (Rp)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</Flabel>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="year_from" value="{{ $filters['year_from'] ?? '' }}"
                                    placeholder="Dari (Cth: 2010)"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                                <input type="number" name="year_to" value="{{ $filters['year_to'] ?? '' }}"
                                    placeholder="Sampai (Cth: 2024)"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                            </div>
                    </div>

                    <div class="mb-4">
                        <label for="transmission" class="block text-sm font-medium text-gray-700 mb-1">Transmisi</label>
                        <select name="transmission" id="transmission"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                            <option value="all" @selected(($filters['transmission'] ?? '') == 'all')>Semua</option>
                            <option value="Otomatis" @selected(($filters['transmission'] ?? '') == 'Otomatis')>Otomatis</option>
                            <option value="Manual" @selected(($filters['transmission'] ?? '') == 'Manual')>Manual</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
                        <select name="condition" id="condition"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm">
                            <option value="all" @selected(($filters['condition'] ?? '') == 'all')>Semua</option>
                            <option value="Baru" @selected(($filters['condition'] ?? '') == 'Baru')>Baru</option>
                            <option value="Bekas" @selected(($filters['condition'] ?? '') == 'Bekas')>Bekas</option>
                        </select>
                    </div>

                    <div class="mt-6 space-y-3">
                        <button type="submit"
                            class="w-full text-center block bg-brand-orange text-white px-4 py-2.5 rounded-md font-semibold hover:bg-opacity-90 transition duration-150 ease-in-out">
                            Terapkan Filter
                        </button>
                        <a href="{{ route('cars.index') }}"
                            class="w-full text-center block bg-gray-200 text-brand-dark px-4 py-2.5 rounded-md font-semibold hover:bg-gray-300 transition duration-150 ease-in-out">
                            Reset Filter
                        </a>
                    </div>
                </form>
            </aside>

            <main class="lg:col-span-3">
                @if ($cars->count())
                    <div class="mb-4">
                        <p class="text-sm text-gray-600">
                            Menampilkan {{ $cars->firstItem() }} - {{ $cars->lastItem() }} dari {{ $cars->total() }}
                            hasil
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($cars as $car)
                            <x-car-card :car="$car" />
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $cars->links() }}
                    </div>
                @else
                    <div class="bg-white p-12 rounded-lg shadow-md text-center col-span-3">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <h2 class="mt-2 text-2xl font-semibold text-brand-dark">Mobil tidak ditemukan</h2>
                        <p class="text-gray-500 mt-2">Maaf, kami tidak dapat menemukan mobil dengan kriteria Anda. Coba
                            reset filter.</p>
                        <a href="{{ route('cars.index') }}"
                            class="mt-6 inline-block bg-brand-orange text-white px-5 py-2 rounded-md font-semibold">
                            Reset Filter
                        </a>
                    </div>
                @endif
            </main>
        </div>
    </div>
</x-app-layout>
