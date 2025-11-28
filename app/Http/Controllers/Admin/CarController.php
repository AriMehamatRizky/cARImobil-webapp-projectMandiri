<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CarImage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand')->latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    // Menampilkan form untuk membuat mobil baru (Halaman 'Create').
    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.cars.create', compact('brands'));
    }

    // Menyimpan mobil baru ke database (Logika 'Create').
    // Ini adalah bagian untuk UPLOAD FILE.
    public function store(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'condition' => 'required|string',
            'transmission' => 'required|string',
            'engine_capacity' => 'required|string|max:100',
            'mileage' => 'required|string|max:100',
            'color' => 'required|string|max:100',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:20480', // 20MB max
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480', // Validasi untuk multiple images
            'stock' => 'required|integer|min:0',
        ]);

        // Simpan Gambar Utama
        // 'cars' adalah nama folder di dalam 'storage/app/public/'
        $mainImagePath = $request->file('main_image')->store('cars', 'public');
        $validated['main_image'] = $mainImagePath;

        // Buat Data Mobil di Database
        // 'slug' akan dibuat otomatis oleh paket Sluggable
        $car = Car::create($validated);

        // Simpan Gambar Galeri (Multiple Upload)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('cars', 'public');
                // Simpan path ke tabel 'car_images'
                $car->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.cars.index')->with('status', 'Mobil baru berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit mobil (Halaman 'Update').
    public function edit(Car $car)
    {
        $brands = Brand::orderBy('name')->get();
        $car->load('images'); // Load gambar galeri untuk ditampilkan
        return view('admin.cars.edit', compact('car', 'brands'));
    }

    // Memperbarui data mobil di database (Logika 'Update').
    public function update(Request $request, Car $car)
    {
        // Validasi (gambar tidak wajib di-update)
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'condition' => 'required|string',
            'transmission' => 'required|string',
            'engine_capacity' => 'required|string|max:100',
            'mileage' => 'required|string|max:100',
            'color' => 'required|string|max:100',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480', // Boleh kosong
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
            'stock' => 'required|integer|min:0',
        ]);

        // Cek & Update Gambar Utama (jika ada yg baru)
        if ($request->hasFile('main_image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($car->main_image);
            // Simpan gambar baru
            $mainImagePath = $request->file('main_image')->store('cars', 'public');
            $validated['main_image'] = $mainImagePath;
        }

        // update Data Mobil
        $car->update($validated);

        // Tambah Gambar Galeri Baru (jika ada)
        // (Catatan: Ini hanya menambah, tidak menghapus yg lama)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('cars', 'public');
                $car->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.cars.index')->with('status', 'Data mobil berhasil diperbarui.');
    }


    public function destroyImage(CarImage $carImage)
    {
        if (Storage::disk('public')->exists($carImage->path)) {
            Storage::disk('public')->delete($carImage->path);
        }

        $carImage->delete(); // Hanya menghapus 1 baris gambar

        return back()->with('status', 'Gambar galeri berhasil dihapus.');
    }

    public function show(Car $car)
    {
        return redirect()->route('admin.cars.index');
    }


    public function destroy(Car $car)
    {
        // Hapus Gambar Utama dari penyimpanan fisik
        if ($car->main_image && Storage::disk('public')->exists($car->main_image)) {
            Storage::disk('public')->delete($car->main_image);
        }

        // Hapus Semua Gambar Galeri dari penyimpanan fisik
        foreach ($car->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
        }

        // Hapus Data Mobil dari database
        $car->delete();

        return redirect()->route('admin.cars.index')->with('status', 'Mobil berhasil dihapus.');
    }

    public function markAsSold(Car $car)
    {
        // Cek apakah stok masih ada
        if ($car->stock > 0) {
            // Kurangi stok sebanyak 1
            $car->decrement('stock');
            
            // Cek sisa stok untuk pesan notifikasi
            if ($car->stock == 0) {
                return back()->with('status', 'Unit terjual! Stok sekarang HABIS (0).');
            } else {
                return back()->with('status', 'Unit terjual! Stok berkurang menjadi ' . $car->stock . '.');
            }
        }

        return back()->with('error', 'Gagal! Stok mobil ini sudah habis.');
    }
}