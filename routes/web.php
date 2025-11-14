<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CompareController;

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
});

require __DIR__ . '/auth.php';
