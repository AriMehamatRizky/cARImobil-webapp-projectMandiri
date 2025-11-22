@extends('layouts.admin')

@section('header')
    Edit Mobil: {{ $car->brand->name }} {{ $car->model }}
@endsection

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-lg">

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <strong class="font-bold">Oops! Ada yang salah:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <div class="mb-4">
                            <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                            <select name="brand_id" id="brand_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">Pilih Merek</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(old('brand_id', $car->brand_id) == $brand->id)>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                            <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $car->price) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <input type="number" name="year" id="year" value="{{ old('year', $car->year) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
                            <select name="condition" id="condition"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="Baru" @selected(old('condition', $car->condition) == 'Baru')>Baru</option>
                                <option value="Bekas" @selected(old('condition', $car->condition) == 'Bekas')>Bekas</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="transmission" class="block text-sm font-medium text-gray-700 mb-1">Transmisi</label>
                            <select name="transmission" id="transmission"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="Otomatis" @selected(old('transmission', $car->transmission) == 'Otomatis')>Otomatis</option>
                                <option value="Manual" @selected(old('transmission', $car->transmission) == 'Manual')>Manual</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="engine_capacity" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                                Mesin</label>
                            <input type="text" name="engine_capacity" id="engine_capacity"
                                value="{{ old('engine_capacity', $car->engine_capacity) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="mileage" class="block text-sm font-medium text-gray-700 mb-1">Jarak Tempuh
                                (Mileage)</label>
                            <input type="text" name="mileage" id="mileage" value="{{ old('mileage', $car->mileage) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Warna</label>
                            <input type="text" name="color" id="color" value="{{ old('color', $car->color) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="main_image" class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto Utama
                                (Kosongkan jika tidak diubah)</label>
                            <input type="file" name="main_image" id="main_image"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-orange file:bg-opacity-10 file:text-brand-orange hover:file:bg-opacity-20">
                            <img src="{{ Storage::url($car->main_image) }}" alt="Foto Utama Saat Ini"
                                class="mt-4 w-40 h-auto rounded-lg shadow-md">
                        </div>

                        <div class="mb-4">
                            <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-1">Tambah Foto
                                Galeri (Bisa lebih dari 1)</label>
                            <input type="file" name="gallery_images[]" id="gallery_images"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"
                                multiple>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($car->images as $image)
                                    <img src="{{ Storage::url($image->path) }}" alt="Galeri"
                                        class="w-20 h-20 object-cover rounded-md shadow-sm">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                        Lengkap</label>
                    <textarea name="description" id="description" rows="5"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $car->description) }}</textarea>
                </div>

                <div class="mt-8 border-t pt-6">
                    <button type="submit"
                        class="w-full bg-brand-orange text-white px-6 py-3 rounded-lg font-semibold text-lg hover:bg-opacity-90 transition duration-150">
                        Update Mobil
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
