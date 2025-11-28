@extends('layouts.admin')

@section('header')
    Tambah Mobil Baru
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

            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <div class="mb-4">
                            <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                            <select name="brand_id" id="brand_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                                <option value="">Pilih Merek</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                            <input type="text" name="model" id="model" value="{{ old('model') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>

                            <input type="number" name="price" id="price" value="{{ old('price') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required oninput="formatPricePreview(this.value)">

                            <p class="text-xs text-brand-orange mt-1 font-bold" id="price_preview">
                                Rp 0
                            </p>
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok Unit</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 1) }}" min="0"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                            <p class="text-xs text-gray-500 mt-1">Masukkan 0 jika stok habis.</p>
                        </div>

                        <div class="mb-4">
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <input type="number" name="year" id="year" value="{{ old('year') }}"
                                placeholder="Contoh: 2023"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
                            <select name="condition" id="condition"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                                <option value="Baru" {{ old('condition') == 'Baru' ? 'selected' : '' }}>Baru</option>
                                <option value="Bekas" {{ old('condition') == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="transmission" class="block text-sm font-medium text-gray-700 mb-1">Transmisi</label>
                            <select name="transmission" id="transmission"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                                <option value="Otomatis" {{ old('transmission') == 'Otomatis' ? 'selected' : '' }}>Otomatis
                                </option>
                                <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="engine_capacity" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                                Mesin</label>
                            <input type="text" name="engine_capacity" id="engine_capacity"
                                value="{{ old('engine_capacity') }}" placeholder="Contoh: 1500cc"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="mileage" class="block text-sm font-medium text-gray-700 mb-1">Jarak Tempuh
                                (Mileage)</label>
                            <input type="text" name="mileage" id="mileage" value="{{ old('mileage') }}"
                                placeholder="Contoh: 10.000 km (0 jika baru)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Warna</label>
                            <input type="text" name="color" id="color" value="{{ old('color') }}"
                                placeholder="Contoh: Hitam Metalik"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="main_image" class="block text-sm font-medium text-gray-700 mb-1">Foto Utama
                                (Wajib)</label>
                            <input type="file" name="main_image" id="main_image"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-orange file:bg-opacity-10 file:text-brand-orange hover:file:bg-opacity-20"
                                required>
                        </div>

                        <div class="mb-4 bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Foto Galeri</label>

                            <div class="flex items-center justify-center w-full mb-4">
                                <label for="gallery-input"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="text-sm text-gray-500"><span
                                                class="font-semibold text-brand-orange">Klik untuk upload</span></p>
                                        <p class="text-xs text-gray-400">Bisa pilih satu per satu (File akan ditambahkan)
                                        </p>
                                    </div>

                                    <input id="gallery-input" type="file" class="hidden" multiple accept="image/*" />

                                    <input type="file" name="gallery_images[]" id="gallery-final" class="hidden"
                                        multiple />
                                </label>
                            </div>

                            <div id="preview-container" class="grid grid-cols-3 gap-3">
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                Lengkap</label>
            <textarea name="description" id="description" rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-orange focus:ring-brand-orange sm:text-sm"
                required>{{ old('description') }}</textarea>
        </div>

        <div class="mt-8 border-t pt-6">
            <button type="submit"
                class="w-full bg-brand-orange text-white px-6 py-3 rounded-lg font-semibold text-lg hover:bg-opacity-90 transition duration-150">
                Simpan Mobil
            </button>
        </div>
        </form>
    </div>
    </div>

    <script>
        function formatPricePreview(value) {
            const previewElement = document.getElementById('price_preview');

            if (!value) {
                previewElement.innerText = 'Rp 0';
                return;
            }

            // Konversi ke angka
            const number = parseFloat(value);

            // Format Rupiah standar (dengan titik)
            const rupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);

            // Format Singkatan (Juta/Miliar)
            let text = "";
            if (number >= 1000000000) {
                text = (number / 1000000000).toFixed(1).replace('.', ',') + " Miliar";
            } else if (number >= 1000000) {
                text = (number / 1000000).toFixed(0) + " Juta";
            }

            // Tampilkan keduanya
            previewElement.innerText = `${rupiah}  (${text})`;
        }


        // Kita butuh wadah (DataTransfer) untuk menampung semua file
        let container = new DataTransfer();

        const inputPemicu = document.getElementById('gallery-input');
        const inputFinal = document.getElementById('gallery-final');
        const previewArea = document.getElementById('preview-container');

        inputPemicu.addEventListener('change', function() {
            // 1. Ambil file yang BARU SAJA dipilih
            let newFiles = this.files;

            // 2. Masukkan ke dalam "Wadah" (DataTransfer)
            for (let i = 0; i < newFiles.length; i++) {
                let file = newFiles[i];

                // Tambahkan ke wadah
                container.items.add(file);

                // --- Bikin Preview Visual ---
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onloadend = function() {
                    let div = document.createElement('div');
                    div.className =
                        'relative group rounded-lg overflow-hidden border border-gray-200 aspect-square';

                    // HTML untuk gambar dan tombol hapus
                    div.innerHTML = `
                    <img src="${reader.result}" class="w-full h-full object-cover">
                    <button type="button" onclick="removeFile('${file.name}', this)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 shadow-md hover:bg-red-600 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                `;
                    previewArea.appendChild(div);
                }
            }

            // 3. Masukkan isi Wadah ke Input Final yang akan dikirim ke Server
            inputFinal.files = container.files;
        });

        // Fungsi untuk menghapus file dari daftar jika tombol X ditekan
        window.removeFile = function(fileName, buttonElement) {
            // Hapus elemen visual
            buttonElement.closest('div').remove();

            // Buat wadah baru
            let newContainer = new DataTransfer();

            // Salin semua file KECUALI yang dihapus
            for (let i = 0; i < container.files.length; i++) {
                if (container.files[i].name !== fileName) {
                    newContainer.items.add(container.files[i]);
                }
            }

            // Update wadah utama dan input final
            container = newContainer;
            inputFinal.files = container.files;
        }
    </script>
@endsection
