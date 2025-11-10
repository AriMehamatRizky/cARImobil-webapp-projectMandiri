<footer class="bg-brand-dark text-gray-400 mt-16">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <span class="text-3xl font-bold text-white">c<span class="text-brand-orange">ARI</span>mobil</span>
                <p class="mt-2 text-sm">Temukan Mobil Impianmu.</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-100 tracking-wider uppercase">Navigasi</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ route('home') }}" class="text-base hover:text-white transition duration-150">Home</a>
                    </li>
                    <li><a href="{{ route('cars.index') }}"
                            class="text-base hover:text-white transition duration-150">Daftar Mobil</a></li>
                    <li><a href="{{ route('login') }}"
                            class="text-base hover:text-white transition duration-150">Login</a></li>
                    <li><a href="{{ route('register') }}"
                            class="text-base hover:text-white transition duration-150">Register</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-100 tracking-wider uppercase">Kontak Kami</h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="https://wa.me/6281234567890?text=Halo%20cARImobil,%20saya%20tertarik%20dengan%20layanan%20Anda."
                            target="_blank"
                            class="flex items-center text-base hover:text-white transition duration-150 group">
                            <svg class="w-5 h-5 mr-2 text-green-500 group-hover:text-green-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448L.057 24zM7.171 6.591c.101-.39 1.011-1.348 1.497-1.488.486-.14 1.026-.135 1.556.12.53.255 1.743 2.037 1.884 2.182.14.145.232.34.101.53-.131.19-.232.34-.413.53-.18.19-.36.205-.539.34-.179.135-.369.319-.51.488-.141.17-.282.34-.131.63.15.289.691 1.251 1.483 1.963.982.923 1.838 1.23 2.09 1.378.252.148.4.13.56.015.161-.115.699-.81 1.011-1.085.312-.275.6-.365.882-.205.282.159 1.84 1.406 2.152 1.64.312.234.5.34.56.41.061.07 0 .375-.081.715-.081.34-.51.6-1.05.82-1.218.51-2.438.315-3.482-.315-1.044-.63-2.06-1.52-2.942-2.583-.882-1.063-1.615-2.267-2.09-3.554-.473-1.287-.4-2.438.12-3.313z" />
                            </svg>
                            Hubungi via WhatsApp
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-700 pt-8 text-center">
            <p class="text-base">&copy; {{ date('Y') }} cARImobil. Dibuat dengan Laravel & TailwindCSS.</p>
        </div>
    </div>
</footer>
