<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-white">Buat Akun</h2>
        <p class="text-sm text-gray-300 mt-2">Mulai cari mobil impian Anda hari ini.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="Jhon Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
            <input id="email" type="email" name="email" :value="old('email')" required
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi
                Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full py-3.5 px-4 bg-white text-brand-dark font-bold rounded-xl shadow-lg hover:bg-gray-100 transform hover:-translate-y-0.5 transition-all duration-200">
            {{ __('DAFTAR AKUN') }}
        </button>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-400">Sudah punya akun?
                <a href="{{ route('login') }}"
                    class="font-bold text-brand-orange hover:text-white transition-colors">Login di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
