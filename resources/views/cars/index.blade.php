<x-app-layout>
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-brand-dark">
                Daftar Mobil
            </h1>
            <p class="text-gray-500 mt-2">Temukan mobil baru dan bekas terbaik untuk Anda.</p>
        </div>
    </header>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <aside class="lg:col-span-1">
                <form action="{{ route('cars.index') }}" method="GET"
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-24">

                    @if (request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-2">
                        <h3 class="text-lg font-bold text-brand-dark">Filter</h3>
                        <a href="{{ route('cars.index') }}" class="text-xs text-brand-orange hover:underline">Reset</a>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Kata Kunci</label>
                        <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                            placeholder="Cari Toyota, Honda..."
                            class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Merek</label>
                        <select name="brand"
                            class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                            <option value="">Semua Merek</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->slug }}" @selected(($filters['brand'] ?? '') == $brand->slug)>{{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Harga</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="price_from" value="{{ $filters['price_from'] ?? '' }}"
                                placeholder="Min"
                                class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                            <input type="number" name="price_to" value="{{ $filters['price_to'] ?? '' }}"
                                placeholder="Max"
                                class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Tahun</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="year_from" value="{{ $filters['year_from'] ?? '' }}"
                                placeholder="Min"
                                class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                            <input type="number" name="year_to" value="{{ $filters['year_to'] ?? '' }}"
                                placeholder="Max"
                                class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Transmisi</label>
                        <select name="transmission"
                            class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                            <option value="all" @selected(($filters['transmission'] ?? '') == 'all')>Semua</option>
                            <option value="Otomatis" @selected(($filters['transmission'] ?? '') == 'Otomatis')>Otomatis</option>
                            <option value="Manual" @selected(($filters['transmission'] ?? '') == 'Manual')>Manual</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Kondisi</label>
                        <select name="condition"
                            class="block w-full rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange">
                            <option value="all" @selected(($filters['condition'] ?? '') == 'all')>Semua</option>
                            <option value="Baru" @selected(($filters['condition'] ?? '') == 'Baru')>Baru</option>
                            <option value="Bekas" @selected(($filters['condition'] ?? '') == 'Bekas')>Bekas</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full mt-4 bg-brand-dark text-white px-4 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition">
                        Terapkan Filter
                    </button>
                </form>
            </aside>

            <main class="lg:col-span-3">

                <div
                    class="flex flex-col sm:flex-row justify-between items-center mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">

                    <p class="text-sm text-gray-600 mb-2 sm:mb-0">
                        Menampilkan <span
                            class="font-bold text-brand-dark">{{ $cars->firstItem() ?? 0 }}-{{ $cars->lastItem() ?? 0 }}</span>
                        dari <span class="font-bold text-brand-dark">{{ $cars->total() }}</span> mobil
                    </p>

                    <div class="flex items-center gap-2">
                        <label for="sort_by" class="text-sm text-gray-500">Urutkan:</label>
                        <select id="sort_by" onchange="applySort(this.value)"
                            class="rounded-lg border-gray-200 text-sm focus:border-brand-orange focus:ring-brand-orange py-2 pl-3 pr-8 cursor-pointer">
                            <option value="newest" @selected(request('sort') == 'newest')>Paling Baru Diinput</option>
                            <option value="lowest_price" @selected(request('sort') == 'lowest_price')>Harga Terendah</option>
                            <option value="highest_price" @selected(request('sort') == 'highest_price')>Harga Tertinggi</option>
                            <option value="newest_year" @selected(request('sort') == 'newest_year')>Tahun Terbaru (Unit)</option>
                            <option value="oldest_year" @selected(request('sort') == 'oldest_year')>Tahun Terlama (Unit)</option>
                        </select>
                    </div>
                </div>

                @if ($cars->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($cars as $car)
                            <x-car-card :car="$car" />
                        @endforeach
                    </div>
                    <div class="mt-12">
                        {{ $cars->links() }}
                    </div>
                @else
                    <div class="bg-white p-12 rounded-xl text-center border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Mobil tidak ditemukan</h2>
                        <p class="text-gray-500 mt-2">Coba ubah filter pencarian Anda.</p>
                        <a href="{{ route('cars.index') }}"
                            class="mt-4 inline-block bg-brand-orange text-white px-5 py-2 rounded-md font-semibold">
                            Reset Filter
                        </a>
                    </div>
                @endif
            </main>
        </div>
    </div>

    <script>
        function applySort(sortValue) {
            // Ambil URL saat ini
            const currentUrl = new URL(window.location.href);

            // Update parameter 'sort'
            currentUrl.searchParams.set('sort', sortValue);

            // Reset page ke 1 setiap kali sort berubah agar tidak error paging
            currentUrl.searchParams.delete('page');

            // Redirect ke URL baru
            window.location.href = currentUrl.toString();
        }
    </script>
</x-app-layout>
