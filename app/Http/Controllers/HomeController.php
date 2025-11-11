<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 8 mobil terbaru (termasuk relasi brand) sebagai 'populer'
        $popularCars = Car::with('brand')->latest()->take(8)->get();

        // Ambil 6 merek dengan jumlah mobil terbanyak
        $brands = Brand::withCount('cars') // Menghitung jumlah mobil di relasi 'cars'
            ->orderByDesc('cars_count') // Urutkan dari yg terbanyak
            ->take(6)
            ->get();

        return view('welcome', [
            'popularCars' => $popularCars,
            'brands' => $brands,
        ]);
    }
}