<?php
// app/Http/Controllers/WishlistController.php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Menampilkan halaman wishlist pengguna.
     */
    public function index()
    {
        $cars = auth()->user()
            ->wishlistCars()
            ->with('brand')
            ->latest()
            ->get();

        return view('wishlist.index', ['cars' => $cars]);
    }


    public function toggle(Car $car)
    {
        // - Jika ID ada, akan di-detach (hapus)
        // - Jika ID tidak ada, akan di-attach (tambah)
        auth()->user()->wishlistCars()->toggle($car->id);

        return back()->with('status', 'Wishlist diperbarui!');
    }
}