<x-app-layout>
    <div class="bg-brand-dark text-white py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-bold">Perbandingan Mobil</h1>
                <p class="text-gray-400 mt-2">Bandingkan spesifikasi hingga 3 mobil secara berdampingan.</p>
            </div>

            @if ($cars->count() > 0)
                <a href="{{ route('compare.clear') }}"
                    class="text-sm text-red-400 hover:text-red-300 hover:underline flex items-center transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    Hapus Semua
                </a>
            @endif
        </div>
    </div>

    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('status'))
                <div
                    class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif

            @if ($cars->count())
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="p-6 bg-gray-50 border-b border-gray-200 w-48 min-w-[150px]">
                                        <span
                                            class="text-xs font-bold text-gray-400 uppercase tracking-wider">Spesifikasi</span>
                                    </th>
                                    @foreach ($cars as $car)
                                        <th class="p-6 border-b border-gray-200 min-w-[250px] align-top relative group">
                                            <form action="{{ route('compare.remove', $car) }}" method="POST"
                                                class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                                @csrf
                                                <button type="submit" class="text-gray-400 hover:text-red-500"
                                                    title="Hapus dari perbandingan">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                            <div class="mb-4 h-40 rounded-lg overflow-hidden">
                                                <img src="{{ Storage::url($car->main_image) }}"
                                                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                            </div>
                                            <h3 class="text-xl font-bold text-brand-dark">
                                                <a href="{{ route('cars.show', $car->slug) }}"
                                                    class="hover:text-brand-orange">{{ $car->model }}</a>
                                            </h3>
                                            <p class="text-sm text-gray-500">{{ $car->brand->name }}</p>
                                            <p class="text-2xl font-bold text-brand-orange mt-2">Rp
                                                {{ number_format($car->price / 1000000, 0) }} jt</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Tahun</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100 font-medium text-gray-800">
                                            {{ $car->year }}</td>
                                    @endforeach
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Kondisi</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100">
                                            <span
                                                class="px-2 py-1 rounded text-xs font-bold {{ $car->condition == 'Baru' ? 'bg-brand-orange text-white' : 'bg-gray-200 text-gray-700' }}">
                                                {{ $car->condition }}
                                            </span>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Transmisi</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100 text-gray-700">{{ $car->transmission }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Mesin</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100 text-gray-700">
                                            {{ $car->engine_capacity }}</td>
                                    @endforeach
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Kilometer</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100 text-gray-700">{{ $car->mileage }}</td>
                                    @endforeach
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-gray-100 font-semibold text-gray-500 bg-gray-50/50">
                                        Warna</td>
                                    @foreach ($cars as $car)
                                        <td class="p-4 border-b border-gray-100 text-gray-700">{{ $car->color }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="p-4 bg-gray-50/50"></td>
                                    @foreach ($cars as $car)
                                        <td class="p-4">
                                            <a href="{{ route('cars.show', $car->slug) }}"
                                                class="block w-full py-2 text-center border border-brand-dark text-brand-dark rounded hover:bg-brand-dark hover:text-white transition">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="max-w-lg mx-auto text-center py-16">
                    <div class="inline-block p-6 rounded-full bg-gray-100 mb-6">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-brand-dark mb-2">Belum Ada Perbandingan</h2>
                    <p class="text-gray-500 mb-8">Tambahkan hingga 3 mobil untuk melihat perbedaan spesifikasinya secara
                        berdampingan.</p>
                    <a href="{{ route('cars.index') }}"
                        class="inline-block bg-brand-dark text-white px-8 py-3 rounded-full font-bold hover:bg-opacity-90 transition">
                        Cari Mobil
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
