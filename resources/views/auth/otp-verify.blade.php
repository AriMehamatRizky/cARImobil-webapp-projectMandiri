<x-guest-layout>
    <a href="/">
        <img src="{{ asset('img/logocARImobil.png') }}" alt="cARImobil Logo"
            class="w-20 h-20 mx-auto rounded-full shadow-md">
    </a>

    <div class="my-4 text-sm text-gray-600">
        Terima kasih telah mendaftar! Kami telah mengirimkan kode OTP 6 digit ke email Anda:
        <strong>{{ $email ?? session('otp_user_email') }}</strong>.
        <br><br>
        Silakan periksa inbox dan masukkan kode di bawah ini untuk
        memverifikasi akun Anda.
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email ?? session('otp_user_email') }}">

        <div>
            <x-input-label for="otp_code" :value="__('Kode OTP')" />
            <x-text-input id="otp_code" class="block mt-1 w-full" type="text" name="otp_code" :value="old('otp_code')"
                required autofocus autocomplete="one-time-code" />

            <x-input-error :messages="$errors->get('otp_code')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"
                class="w-full inline-flex items-center justify-center px-4 py-2 bg-brand-orange border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Verifikasi Akun') }}
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('otp.resend') }}" class="mt-4 text-center">
        @csrf
        <input type="hidden" name="email" value="{{ $email ?? session('otp_user_email') }}">
        <div class="text-sm text-gray-600">
            Tidak menerima kode?
            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Kirim ulang kode OTP') }}
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-2 text-center">
        @csrf
        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
            {{ __('Batal & Log Out') }}
        </button>
    </form>
</x-guest-layout>
