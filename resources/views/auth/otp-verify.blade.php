<x-guest-layout>
    <!-- Judul Header -->
    <div class="mb-8 text-center">
        <div class="mx-auto w-16 h-16 bg-brand-orange/20 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                </path>
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-white">Verifikasi Keamanan</h2>
        <p class="text-sm text-gray-300 mt-3">
            Demi keamanan, masukkan 6 digit kode OTP yang telah kami kirim ke email Anda.
        </p>
    </div>

    @if (session('status'))
        <div
            class="mb-6 font-medium text-sm text-green-400 bg-green-900/30 border border-green-500/50 p-4 rounded-xl text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="email" value="{{ $email ?? session('otp_user_email') }}">

        <!-- Input Kode OTP -->
        <div>
            <label for="otp_code" class="block text-sm font-medium text-gray-300 mb-2 text-center">Masukkan Kode 6
                Digit</label>

            <input id="otp_code" type="text" name="otp_code" required autofocus maxlength="6"
                class="w-full px-4 py-4 bg-black/30 border-2 border-white/10 rounded-2xl text-white placeholder-gray-600 text-center text-3xl font-bold tracking-[0.5em] focus:ring-4 focus:ring-brand-orange/30 focus:border-brand-orange transition-all"
                placeholder="••••••"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />

            <x-input-error :messages="$errors->get('otp_code')" class="mt-2 text-center" />
        </div>

        <!-- Tombol Verifikasi -->
        <button type="submit"
            class="w-full py-4 px-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:to-brand-orange text-white font-bold text-lg rounded-xl shadow-lg shadow-orange-500/30 transform hover:-translate-y-0.5 transition-all duration-200">
            {{ __('VERIFIKASI AKUN') }}
        </button>
    </form>

    <!-- Footer Links -->
    <div class="text-center mt-8 space-y-4">
        <!-- Form Kirim Ulang -->
        <form method="POST" action="{{ route('otp.resend') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email ?? session('otp_user_email') }}">
            <p class="text-sm text-gray-400">Belum menerima kode?</p>
            <button type="submit"
                class="text-brand-orange hover:text-white font-semibold transition-colors focus:outline-none underline mt-1">
                Kirim Ulang Kode OTP
            </button>
        </form>

        <!-- Link Logout -->
        <div class="border-t border-white/10 pt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-sm text-gray-500 hover:text-red-400 transition-colors flex items-center justify-center mx-auto">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Keluar (Logout) & Gunakan Akun Lain
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
