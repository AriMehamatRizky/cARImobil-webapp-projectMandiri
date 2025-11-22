<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua user.
     */
    public function index()
    {
        // Ambil semua user, urutkan dari yang terbaru
        // paginate(10) artinya 10 user per halaman
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy(User $user)
    {
        // Validasi: Jangan biarkan admin menghapus dirinya sendiri yang sedang login
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri saat sedang login.');
        }

        // Hapus user
        $user->delete();

        return back()->with('status', 'User berhasil dihapus.');
    }
}