<footer class="bg-[#111] text-gray-400 border-t border-white/5 font-sans">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <div class="space-y-4">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('img/logocARImobil.png') }}"
                        class="h-10 w-10 rounded-full grayscale hover:grayscale-0 transition-all duration-300">
                    <span class="text-2xl font-bold text-white tracking-tight">c<span
                            class="text-brand-orange">ARI</span>mobil</span>
                </a>
                <p class="text-sm leading-relaxed text-gray-500">
                    Platform jual beli mobil terpercaya dengan pengalaman digital terbaik. Temukan mobil impian Anda
                    dengan mudah, cepat, dan aman.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="#" class="text-gray-500 hover:text-white transition"><span
                            class="sr-only">Facebook</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg></a>
                    <a href="#" class="text-gray-500 hover:text-white transition"><span
                            class="sr-only">Instagram</span><svg class="h-5 w-5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg></a>
                </div>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-6">Navigasi</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-brand-orange transition-colors duration-200">Beranda</a></li>
                    <li><a href="{{ route('cars.index') }}"
                            class="hover:text-brand-orange transition-colors duration-200">Daftar Mobil</a></li>
                    <li><a href="{{ route('register') }}"
                            class="hover:text-brand-orange transition-colors duration-200">Daftar Akun</a></li>
                    <li><a href="{{ route('login') }}"
                            class="hover:text-brand-orange transition-colors duration-200">Masuk</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-6">Bantuan</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-brand-orange transition-colors duration-200">Syarat &
                            Ketentuan</a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors duration-200">Kebijakan
                            Privasi</a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors duration-200">Pusat
                            Bantuan</a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors duration-200">Hubungi
                            Kami</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-6">Newsletter</h3>
                <p class="text-sm text-gray-500 mb-4">Dapatkan info mobil terbaru setiap minggu.</p>
                <form class="flex flex-col space-y-2">
                    <input type="email" placeholder="Masukkan email Anda"
                        class="bg-white/5 border border-white/10 text-white text-sm rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-brand-orange focus:border-transparent outline-none transition-all">
                    <button type="button"
                        class="bg-brand-orange text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-orange-600 transition-all">Langganan</button>
                </form>
            </div>

        </div>

        <div class="mt-16 border-t border-white/10 pt-8 text-center">
            <p class="text-sm text-gray-600">&copy; {{ date('Y') }} cARImobil Indonesia. All rights reserved.</p>
        </div>
    </div>
</footer>
