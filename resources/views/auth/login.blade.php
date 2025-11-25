<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-white">Welcome Back</h2>
        <p class="text-sm text-gray-300 mt-2">Masuk untuk melanjutkan perjalananmu.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-white/10 border-white/20 text-brand-orange focus:ring-brand-orange"
                    name="remember">
                <span class="ms-2 text-gray-300">{{ __('Ingat Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-brand-orange hover:text-white transition-colors duration-200"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full py-3.5 px-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:to-brand-orange text-white font-bold rounded-xl shadow-lg shadow-orange-500/30 transform hover:-translate-y-0.5 transition-all duration-200">
            {{ __('MASUK SEKARANG') }}
        </button>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-400">Belum punya akun?
                <a href="{{ route('register') }}"
                    class="font-bold text-white hover:text-brand-orange transition-colors">Daftar Gratis</a>
            </p>
        </div>
    </form>
</x-guest-layout>
