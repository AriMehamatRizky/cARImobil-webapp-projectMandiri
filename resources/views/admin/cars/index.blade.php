@extends('layouts.admin')

@section('header')
    Manajemen Mobil
@endsection

@section('content')
    <div class="w-full mx-auto">

        <div class="mb-5 flex justify-between items-center">
            <a href="{{ route('admin.cars.create') }}"
                class="inline-block bg-brand-orange text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-opacity-90 transition-all duration-200">
                + Tambah Mobil Baru
            </a>

            @if (session('status'))
                <div class="bg-green-200 text-green-800 px-4 py-2 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Mobil</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merek
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($cars as $car)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ Storage::url($car->main_image) }}" alt="{{ $car->model }}"
                                        class="w-24 h-16 object-cover rounded-md">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $car->model }}</div>
                                    <div class="text-sm text-gray-500">{{ $car->year }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800">
                                        {{ $car->brand->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-semibold">Rp
                                        {{ number_format($car->price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.cars.edit', $car->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>

                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Anda yakin ingin menghapus mobil ini? Semua gambar terkait akan dihapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    Belum ada data mobil. Silakan tambahkan mobil baru.
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
