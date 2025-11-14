<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-brand-dark leading-tight">
                Perbandingan Mobil
            </h2>
            @if($cars->count() > 0)
                <a href="{{ route('compare.clear') }}" class="text-sm text-red-600 hover:text-red-800 transition duration-150">
                    Bersihkan Semua
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">

            @if(session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
                @if($cars->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                    Spesifikasi
                                </th>
                                @foreach($cars as $car)
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $car->brand->name }} {{ $car->model }}
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Gambar</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4">
                                    <a href="{{ route('cars.show', $car->slug) }}">
                                        <img src="{{ Storage::url($car->main_image) }}" class="w-40 h-auto rounded-md shadow-sm">
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Harga</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-lg text-brand-orange font-bold">
                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tahun</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->year }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kondisi</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->condition }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Transmisi</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->transmission }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kapasitas Mesin</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->engine_capacity }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jarak Tempuh</td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->mileage }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-6 py-4"></td>
                                @foreach($cars as $car)
                                <td class="px-6 py-4">
                                    <form action="{{ route('compare.remove', $car) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                        </svg>
                        <h2 class="mt-2 text-2xl font-semibold text-brand-dark">Daftar perbandingan kosong</h2>
                        <p class="text-gray-500 mt-2">Tambahkan mobil dari halaman detail untuk mulai membandingkan.</p>
                        <a href="{{ route('cars.index') }}" class="mt-6 inline-block bg-brand-orange text-white px-5 py-2 rounded-md font-semibold">
                            Cari Mobil
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>