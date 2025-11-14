<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OtpVerificationController extends Controller
{
    /**
     * Menampilkan halaman form verifikasi OTP.
     */
    public function show(Request $request)
    {
        // Pastikan user datang dari halaman registrasi
        if (!$request->session()->has('otp_user_email')) {
            return redirect()->route('register');
        }

        return view('auth.otp-verify', [
            'email' => $request->session()->get('otp_user_email')
        ]);
    }

    /**
     * Memproses verifikasi OTP.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|string|min:6|max:6',
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User tidak ditemukan.']);
        }

        if ($user->otp_expires_at && now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp_code' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang.']);
        }

        if ($user->otp_code !== $request->otp_code) {
            return back()->withErrors(['otp_code' => 'Kode OTP tidak valid.']);
        }

        // Verifikasi sukses!
        $user->forceFill([
            'email_verified_at' => now(), // Tandai sebagai terverifikasi
            'otp_code' => null,           // Hapus OTP
            'otp_expires_at' => null,
        ])->save();

        // Hapus email dari session
        $request->session()->forget('otp_user_email');

        // Login-kan user
        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Mengirim ulang kode OTP.
     */
    public function resend(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Buat OTP baru
            $otpCode = rand(100000, 999999);
            $user->forceFill([
                'otp_code' => $otpCode,
                'otp_expires_at' => now()->addMinutes(10),
            ])->save();

            // Kirim email (akan ditangkap Mailpit)
            Mail::to($user->email)->send(new SendOtpMail((string) $otpCode));

            return back()->with('status', 'Kode OTP baru telah dikirim.');
        }

        return back()->withErrors(['email' => 'User tidak ditemukan.']);
    }
}