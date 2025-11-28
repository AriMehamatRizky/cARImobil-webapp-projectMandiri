@extends('layouts.admin')

@section('header')
    Manajemen Mobil
@endsection

@section('content')
    <div class="w-full mx-auto">

        <div class="mb-5 flex justify-between items-center">
            <a href="{{ route('admin.cars.create') }}"
                class="inline-flex items-center bg-brand-orange text-white px-5 py-2.5 rounded-lg font-bold shadow-md hover:bg-orange-600 transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Mobil Baru
            </a>

            @if (session('status'))
                <div
                    class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded-lg text-sm font-medium flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-2 rounded-lg text-sm font-medium">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Info
                                Mobil</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Harga
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Stok
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Status Penjualan</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($cars as $car)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-16 w-24">
                                            <img class="h-16 w-24 rounded-lg object-cover border border-gray-200"
                                                src="{{ Storage::url($car->main_image) }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $car->brand->name }}
                                                {{ $car->model }}</div>
                                            <div class="text-xs text-gray-500">{{ $car->year }} •
                                                {{ $car->transmission }}</div>
                                            <div class="text-xs text-gray-400 mt-1">{{ $car->condition }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-brand-orange">{{ $car->formatted_price }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($car->stock > 0)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                            {{ $car->stock }} Unit
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">
                                            Habis
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($car->stock > 0)
                                        <form action="{{ route('admin.cars.sold', $car->id) }}" method="POST"
                                            onsubmit="return confirm('Konfirmasi: 1 Unit mobil ini telah TERJUAL? Stok akan berkurang otomatis.');">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-600 text-xs font-bold rounded-md hover:bg-green-50 transition-colors"
                                                title="Kurangi 1 Stok">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Catat Terjual
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 font-medium italic">Sold Out</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.cars.edit', $car->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 p-2 rounded-lg hover:bg-indigo-100 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus permanen data mobil ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg hover:bg-red-100 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="bg-gray-100 p-4 rounded-full mb-4">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 text-lg font-medium">Belum ada mobil yang ditambahkan.</p>
                                        <p class="text-gray-400 text-sm mt-1">Mulai tambahkan mobil pertama Anda sekarang.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $cars->links() }}
        </div>
    </div>
@endsection
