<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query()->with('brand');

        // Filter Pencarian (berdasarkan model atau merek)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('model', 'like', '%' . $request->search . '%')
                    ->orWhereHas('brand', fn($bq) => $bq->where('name', 'like', '%' . $request->search . '%'));
            });
        }

        // Filter Merek (berdasarkan slug)
        if ($request->filled('brand')) {
            $query->whereHas('brand', fn($q) => $q->where('slug', $request->brand));
        }

        // Filter Harga (dari - sampai)
        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        // Filter Transmisi
        if ($request->filled('transmission') && $request->transmission != 'all') {
            $query->where('transmission', $request->transmission);
        }

        // Filter Kondisi
        if ($request->filled('condition') && $request->condition != 'all') {
            $query->where('condition', $request->condition);
        }

        // Filter Tahun
        if ($request->filled('year_from')) {
            $query->where('year', '>=', $request->year_from);
        }
        if ($request->filled('year_to')) {
            $query->where('year', '<=', $request->year_to);
        }

        // Ambil data dengan paginasi, withQueryString() agar filter tetap ada saat pindah halaman paginasi
        $cars = $query->latest()->paginate(12)->withQueryString();

        // Ambil semua merek untuk dropdown filter
        $brands = Brand::orderBy('name', 'asc')->get();

        return view('cars.index', [
            'cars' => $cars,
            'brands' => $brands,
            'filters' => $request->all(), // Untuk mengisi ulang form filter
        ]);
    }

    /**
     * Menampilkan halaman detail satu mobil.
     */
    public function show(Car $car)
    {
        // Load relasi gambar dan merek
        $car->load('images', 'brand');

        // Ambil 4 mobil 'terkait' (dari merek yg sama, tapi bukan mobil ini sendiri)
        $relatedCars = Car::where('brand_id', $car->brand_id)
            ->where('id', '!=', $car->id) // exclude mobil ini
            ->with('brand')
            ->latest()
            ->take(4)
            ->get();

        return view('cars.show', [
            'car' => $car,
            'relatedCars' => $relatedCars
        ]);
    }
}
