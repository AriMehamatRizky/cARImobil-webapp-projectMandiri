@extends('layouts.admin')

@section('header')
    Edit Mobil: {{ $car->brand->name }} {{ $car->model }}
@endsection

@section('content')
    <div class="w-full mx-auto space-y-6">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                <strong class="font-bold">Oops! Ada yang salah:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <h3 class="text-lg font-bold text-brand-dark mb-4 border-b pb-2">Kelola Foto Galeri</h3>

            @if ($car->images->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    @foreach ($car->images as $image)
                        <div class="relative group rounded-lg overflow-hidden shadow-sm border border-gray-200">
                            <img src="{{ Storage::url($image->path) }}" class="w-full h-32 object-cover">

                            <div
                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-200 flex items-center justify-center">
                                <form action="{{ route('admin.car-images.destroy', $image->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus gambar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transform scale-75 group-hover:scale-100 transition-all duration-200 hover:bg-red-700 shadow-md"
                                        title="Hapus Gambar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic text-sm">Tidak ada foto galeri tambahan.</p>
            @endif
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-lg font-bold text-brand-dark mb-6 border-b pb-2">Edit Data Mobil</h3>

            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                            <select name="brand_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(old('brand_id', $car->brand_id) == $brand->id)>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                            <input type="text" name="model" value="{{ old('model', $car->model) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $car->price) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <input type="number" name="year" value="{{ old('year', $car->year) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
                                <select name="condition" class="w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="Baru" @selected(old('condition', $car->condition) == 'Baru')>Baru</option>
                                    <option value="Bekas" @selected(old('condition', $car->condition) == 'Bekas')>Bekas</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Transmisi</label>
                                <select name="transmission" class="w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="Otomatis" @selected(old('transmission', $car->transmission) == 'Otomatis')>Otomatis</option>
                                    <option value="Manual" @selected(old('transmission', $car->transmission) == 'Manual')>Manual</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mesin</label>
                            <input type="text" name="engine_capacity"
                                value="{{ old('engine_capacity', $car->engine_capacity) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mileage</label>
                            <input type="text" name="mileage" value="{{ old('mileage', $car->mileage) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Warna</label>
                            <input type="text" name="color" value="{{ old('color', $car->color) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Foto Utama (Thumbnail)</label>
                            <div class="flex items-center gap-4">
                                <img src="{{ Storage::url($car->main_image) }}"
                                    class="w-20 h-20 object-cover rounded-md border">
                                <input type="file" name="main_image" class="text-sm text-gray-500">
                            </div>
                        </div>

                        <div class="mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tambah Galeri Baru</label>
                            <input type="file" name="gallery_images[]" multiple
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-orange file:text-white hover:file:bg-opacity-90">
                            <p class="text-xs text-gray-500 mt-1">*Bisa pilih banyak foto sekaligus. Foto lama di atas tidak
                                akan terhapus.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $car->description) }}</textarea>
                </div>

                <div class="mt-8 border-t pt-6">
                    <button type="submit"
                        class="w-full bg-brand-dark text-white px-6 py-3 rounded-lg font-bold text-lg hover:bg-opacity-90 transition duration-150">
                        SIMPAN PERUBAHAN
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
