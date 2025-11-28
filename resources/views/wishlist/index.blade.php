<x-app-layout>
    <div class="bg-white border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-brand-dark">Wishlist Saya</h1>
                <p class="text-gray-500 mt-1">Mobil impian yang Anda simpan.</p>
            </div>
            <div class="hidden sm:block">
                <span class="px-4 py-2 bg-red-50 text-red-600 rounded-full text-sm font-bold border border-red-100">
                    {{ $cars->count() }} Item Disimpan
                </span>
            </div>
        </div>
    </div>

    <div class="py-12 bg-gray-50 min-h-[60vh]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            @if ($cars->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($cars as $car)
                        <x-car-card :car="$car" />
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <p class="text-gray-400 text-sm">Ingin mencari lebih banyak?</p>
                    <a href="{{ route('cars.index') }}"
                        class="text-brand-orange font-bold hover:underline mt-1 inline-block">Lihat Daftar Mobil</a>
                </div>
            @else
                <div class="max-w-lg mx-auto text-center py-10">
                    <div class="mb-8 relative">
                        <div class="absolute inset-0 bg-red-100 rounded-full blur-2xl opacity-60"></div>
                        <svg class="relative w-40 h-40 mx-auto text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Garasi Anda Masih Kosong</h2>
                    <p class="text-gray-500 text-lg mb-8">Sepertinya Anda belum menemukan mobil yang cocok untuk
                        disimpan di hati.</p>

                    <a href="{{ route('cars.index') }}"
                        class="inline-flex items-center px-8 py-4 bg-brand-orange text-white font-bold rounded-full shadow-lg shadow-orange-200 hover:bg-orange-600 hover:-translate-y-1 transition-all duration-300">
                        Mulai Berburu Mobil
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
