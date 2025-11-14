<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    // Nama key di session
    private $sessionKey = 'compare.cars';

    /**
     * Menampilkan halaman perbandingan.
     */
    public function index()
    {
        // Ambil array ID mobil dari session, jika tidak ada, default-nya array kosong
        $carIds = session($this->sessionKey, []);

        // Ambil data mobil dari DB berdasarkan ID di session
        $cars = Car::with('brand')->findMany($carIds);

        return view('compare.index', ['cars' => $cars]);
    }

    /**
     * Menambahkan mobil ke daftar perbandingan.
     */
    public function add(Request $request, Car $car)
    {
        $compare = $request->session()->get($this->sessionKey, []);

        // Cek jika mobil sudah ada di daftar
        if (in_array($car->id, $compare)) {
            return back()->with('error', 'Mobil ini sudah ada di daftar perbandingan.');
        }

        // Batasi maksimal 3 mobil
        if (count($compare) >= 3) {
            return back()->with('error', 'Anda hanya bisa membandingkan maksimal 3 mobil.');
        }

        // Tambahkan ID mobil ke session
        $request->session()->push($this->sessionKey, $car->id);

        // Arahkan ke halaman compare
        return redirect()->route('compare.index')->with('status', 'Mobil ditambahkan ke perbandingan.');
    }

    /**
     * Menghapus mobil dari daftar perbandingan.
     */
    public function remove(Request $request, Car $car)
    {
        $compare = $request->session()->get($this->sessionKey, []);

        // Filter array, hapus ID mobil yang dimaksud
        $newCompare = array_filter($compare, fn($id) => $id != $car->id);

        // Simpan kembali array yang sudah difilter ke session
        $request->session()->put($this->sessionKey, $newCompare);

        return back()->with('status', 'Mobil dihapus dari perbandingan.');
    }

    /**
     * Menghapus semua mobil dari daftar perbandingan.
     */
    public function clear(Request $request)
    {
        // Hapus key 'compare.cars' dari session
        $request->session()->forget($this->sessionKey);

        return redirect()->route('compare.index');
    }
}