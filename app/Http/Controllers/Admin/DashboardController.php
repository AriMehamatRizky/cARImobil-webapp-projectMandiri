<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data statistik sesuai permintaan
        $totalCars = Car::count();

        // Kita hitung user biasa saja (bukan admin)
        $totalUsers = User::where('is_admin', false)->count();

        // Kirim data ke view
        return view('admin.dashboard', [
            'totalCars' => $totalCars,
            'totalUsers' => $totalUsers,
        ]);
    }
}
