<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car:slug}', [CarController::class, 'show'])->name('cars.show');

Route::get('/otp/verify', [OtpVerificationController::class, 'show'])->name('otp.verification.notice');
Route::post('/otp/verify', [OtpVerificationController::class, 'verify'])->name('otp.verify');
Route::post('/otp/resend', [OtpVerificationController::class, 'resend'])->name('otp.resend');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{car}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
    Route::post('/compare/{car}', [CompareController::class, 'add'])->name('compare.add');
    Route::post('/compare/remove/{car}', [CompareController::class, 'remove'])->name('compare.remove');
    Route::get('/compare/clear', [CompareController::class, 'clear'])->name('compare.clear');

    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

        // Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::delete('/car-images/{carImage}', [AdminCarController::class, 'destroyImage'])->name('car-images.destroy');
        Route::resource('/cars', AdminCarController::class);

        // Admin Manajemen User
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__ . '/auth.php';
