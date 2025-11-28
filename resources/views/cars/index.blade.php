<x-app-layout>

    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
            /* Paksa hilangkan panah default */
        }

        /* Scrollbar cantik untuk sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 4px;
        }

        .custom-scrollbar:hover::-webkit-scrollbar-thumb {
            background: #F47B20;
        }
    </style>

    <div class="relative bg-[#121212] py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(#333 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-brand-orange/20 blur-[120px] rounded-full translate-x-1/3 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-blue-600/10 blur-[120px] rounded-full -translate-x-1/3 translate-y-1/2">
        </div>

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-4">
                Temukan <span class="text-brand-orange">Karaktermu</span>
            </h1>
            <p class="text-gray-400 max-w-xl mx-auto text-lg font-light">
                Koleksi mobil pilihan dengan kualitas terbaik dan harga transparan.
            </p>
        </div>
    </div>

    <div class="bg-[#f8f9fa] min-h-screen py-12 -mt-8 relative z-20 rounded-t-[40px]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <aside class="lg:col-span-3 sticky top-24">

                    <div
                        class="bg-white rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] p-6 border border-gray-100 max-h-[85vh] overflow-y-auto custom-scrollbar">

                        <div class="flex justify-between items-center mb-8">
                            <h3 class="font-bold text-xl text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                                Filter
                            </h3>
                            <a href="{{ route('cars.index') }}"
                                class="text-xs font-bold text-gray-400 hover:text-red-500 transition-colors uppercase tracking-wider">
                                Reset
                            </a>
                        </div>

                        <form action="{{ route('cars.index') }}" method="GET" class="space-y-8">
                            @if (request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif

                            <div class="relative">
                                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                                    placeholder="Cari nama mobil..."
                                    class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border-none rounded-2xl text-sm font-medium text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-brand-orange/50 focus:bg-white transition-all shadow-inner">
                                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <div>
                                <label
                                    class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 block">Kondisi</label>
                                <div class="grid grid-cols-3 gap-2 bg-gray-50 p-1.5 rounded-2xl">
                                    @foreach (['all' => 'Semua', 'Baru' => 'Baru', 'Bekas' => 'Bekas'] as $val => $label)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="condition" value="{{ $val }}"
                                                class="sr-only peer"
                                                {{ ($filters['condition'] ?? 'all') == $val ? 'checked' : '' }}>
                                            <div
                                                class="text-center py-2 text-xs font-bold rounded-xl text-gray-500 transition-all
                                                        peer-checked:bg-white peer-checked:text-brand-orange peer-checked:shadow-md peer-checked:ring-1 peer-checked:ring-black/5
                                                        hover:text-gray-700">
                                                {{ $label }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label
                                    class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 block">Transmisi</label>
                                <div class="flex gap-3">
                                    @foreach (['Otomatis', 'Manual'] as $trans)
                                        <label class="cursor-pointer flex-1">
                                            <input type="radio" name="transmission" value="{{ $trans }}"
                                                class="sr-only peer"
                                                {{ ($filters['transmission'] ?? '') == $trans ? 'checked' : '' }}>
                                            <div
                                                class="py-2.5 px-4 rounded-xl border border-gray-200 text-center text-xs font-bold text-gray-600 transition-all
                                                        peer-checked:bg-brand-orange peer-checked:text-white peer-checked:border-brand-orange peer-checked:shadow-lg peer-checked:shadow-orange-200
                                                        hover:border-gray-300">
                                                {{ $trans }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label
                                    class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">Merek</label>
                                <div class="relative">
                                    <select name="brand"
                                        class="appearance-none w-full bg-gray-50 border-none text-gray-700 py-3.5 px-4 pr-10 rounded-2xl font-semibold focus:ring-2 focus:ring-brand-orange/50 cursor-pointer">
                                        <option value="">Semua Merek</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->slug }}" @selected(($filters['brand'] ?? '') == $brand->slug)>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">Range
                                    Harga (Rp)</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <input type="number" name="price_from" value="{{ $filters['price_from'] ?? '' }}"
                                        placeholder="Min"
                                        class="w-full bg-gray-50 border-none rounded-xl text-sm font-medium py-3 px-4 focus:ring-2 focus:ring-brand-orange/50 placeholder-gray-400">

                                    <input type="number" name="price_to" value="{{ $filters['price_to'] ?? '' }}"
                                        placeholder="Max"
                                        class="w-full bg-gray-50 border-none rounded-xl text-sm font-medium py-3 px-4 focus:ring-2 focus:ring-brand-orange/50 placeholder-gray-400">
                                </div>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">Tahun
                                    Pembuatan</label>
                                <div class="grid grid-cols-1 gap-3">
                                    <input type="number" name="year_from" value="{{ $filters['year_from'] ?? '' }}"
                                        placeholder="Dari(2010)"
                                        class="w-full bg-gray-50 border-none rounded-xl text-sm font-medium py-3 px-4 focus:ring-2 focus:ring-brand-orange/50 placeholder-gray-400">

                                    <input type="number" name="year_to" value="{{ $filters['year_to'] ?? '' }}"
                                        placeholder="Sampai (2025)"
                                        class="w-full bg-gray-50 border-none rounded-xl text-sm font-medium py-3 px-4 focus:ring-2 focus:ring-brand-orange/50 placeholder-gray-400">
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#121212] text-white py-4 rounded-2xl font-bold text-sm hover:bg-brand-orange transition-all duration-300 shadow-lg transform active:scale-95">
                                Terapkan Filter
                            </button>
                        </form>
                    </div>
                </aside>

                <main class="lg:col-span-9">

                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                        <p class="text-gray-500 font-medium">
                            Menampilkan <strong class="text-gray-900">{{ $cars->total() }}</strong> mobil berkualitas
                        </p>

                        <div class="relative mt-4 sm:mt-0 group">
                            <div
                                class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Urutkan</span>

                                <div class="relative">
                                    <select id="sort_by" onchange="applySort(this.value)"
                                        class="appearance-none bg-transparent border-none p-0 pr-6 text-sm font-bold text-gray-800 focus:ring-0 cursor-pointer">
                                        <option value="newest" @selected(request('sort') == 'newest')>Terbaru</option>
                                        <option value="lowest_price" @selected(request('sort') == 'lowest_price')>Termurah</option>
                                        <option value="highest_price" @selected(request('sort') == 'highest_price')>Termahal</option>
                                        <option value="newest_year" @selected(request('sort') == 'newest_year')>Tahun Muda</option>
                                        <option value="oldest_year" @selected(request('sort') == 'oldest_year')>Tahun Tua</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                        <svg class="h-4 w-4 text-brand-orange" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($cars->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($cars as $car)
                                <x-car-card :car="$car" />
                            @endforeach
                        </div>

                        <div class="mt-16">
                            {{ $cars->links() }}
                        </div>
                    @else
                        <div
                            class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Tidak Ditemukan</h3>
                            <p class="text-gray-500 mt-2 mb-8 text-center max-w-sm">Maaf, kriteria pencarian Anda
                                terlalu spesifik.</p>
                            <a href="{{ route('cars.index') }}"
                                class="px-8 py-3 bg-brand-orange text-white font-bold rounded-xl hover:bg-orange-600 transition-colors shadow-lg shadow-orange-200">
                                Reset Filter
                            </a>
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </div>

    <script>
        function applySort(sortValue) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sort', sortValue);
            currentUrl.searchParams.delete('page');
            window.location.href = currentUrl.toString();
        }
    </script>
</x-app-layout>
