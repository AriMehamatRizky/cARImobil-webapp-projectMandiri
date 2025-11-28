<x-app-layout>

    <div class="relative h-[90vh] w-full bg-[#121212] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero_bg.jpg') }}" class="w-full h-full object-cover opacity-50"
                alt="Luxury Car Background"
                onerror="this.src='https://images.unsplash.com/photo-1511919884226-fd3cad34687c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGNhcnxlbnwwfHwwfHx8MA%3D%3D'">
            <div class="absolute inset-0 bg-gradient-to-b from-[#121212]/90 via-[#121212]/30 to-[#121212]"></div>
        </div>

        <div
            class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4 sm:px-6 lg:px-8 mt-[-3rem]">
            <div
                class="inline-flex items-center px-4 py-2 rounded-full border border-brand-orange/30 bg-brand-orange/10 text-brand-orange text-xs font-bold tracking-[0.2em] uppercase mb-8 backdrop-blur-md shadow-lg shadow-orange-900/20">
                The #1 Automotive E-Commerce
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight leading-none mb-6 drop-shadow-2xl">
                Mobil Impian, <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-orange to-yellow-500">Standar
                    Sultan.</span>
            </h1>

            <p class="mt-4 max-w-2xl text-lg text-gray-300 mb-10 font-light leading-relaxed">
                Platform jual beli mobil terpercaya dengan inspeksi 150+ titik. <br class="hidden md:block">
                Transparan, Aman, dan Bergaransi Mesin 1 Tahun.
            </p>

            <div class="flex flex-col sm:flex-row gap-5 w-full justify-center">
                <a href="{{ route('cars.index') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-brand-orange rounded-full hover:bg-orange-600 transition-all duration-300 shadow-[0_0_30px_rgba(244,123,32,0.4)] hover:shadow-[0_0_50px_rgba(244,123,32,0.6)] hover:-translate-y-1">
                    Lihat Stok Mobil
                </a>
                <a href="#how-it-works"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white border border-white/20 rounded-full hover:bg-white/10 backdrop-blur-sm transition-all duration-300">
                    Cara Pembelian
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </div>

    <section class="bg-brand-dark py-16 border-y border-white/5 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-orange/5 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10">
                <div class="p-4">
                    <p class="text-4xl font-black text-white mb-1">1.500+</p>
                    <p class="text-sm text-gray-400 uppercase tracking-wider">Mobil Terjual</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl font-black text-white mb-1">98%</p>
                    <p class="text-sm text-gray-400 uppercase tracking-wider">Pelanggan Puas</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl font-black text-white mb-1">150+</p>
                    <p class="text-sm text-gray-400 uppercase tracking-wider">Titik Inspeksi</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl font-black text-white mb-1">24/7</p>
                    <p class="text-sm text-gray-400 uppercase tracking-wider">Support Tim</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark">Kenapa Memilih Kami?</h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Standar kualitas tertinggi untuk ketenangan pikiran
                    Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div
                    class="p-8 bg-gray-50 rounded-3xl border border-gray-100 hover:shadow-xl hover:border-brand-orange/30 transition-all duration-300 group text-center">
                    <div
                        class="w-20 h-20 mx-auto bg-white rounded-full shadow-md flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-brand-orange" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Lulus Inspeksi 150 Titik</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Pengecekan ketat oleh mekanik bersertifikat. Bebas
                        banjir dan tabrakan.</p>
                </div>
                <div
                    class="p-8 bg-gray-50 rounded-3xl border border-gray-100 hover:shadow-xl hover:border-brand-orange/30 transition-all duration-300 group text-center">
                    <div
                        class="w-20 h-20 mx-auto bg-white rounded-full shadow-md flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-brand-orange" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Garansi Mesin 1 Tahun</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Jaminan kualitas mesin dan transmisi selama 1 tahun
                        penuh.</p>
                </div>
                <div
                    class="p-8 bg-gray-50 rounded-3xl border border-gray-100 hover:shadow-xl hover:border-brand-orange/30 transition-all duration-300 group text-center">
                    <div
                        class="w-20 h-20 mx-auto bg-white rounded-full shadow-md flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-brand-orange" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Harga Jujur & Transparan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Harga yang Anda lihat adalah harga yang Anda bayar.
                        Dokumen lengkap.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-[#1a1a1a] overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-center">
            <span class="text-brand-orange font-bold tracking-widest uppercase text-xs">New Arrival</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">Mobil Baru Masuk</h2>
        </div>

        <div class="w-full px-4">
            @if ($popularCars->count())
                <div class="splide splide-main" role="group" aria-label="Mobil Populer">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($popularCars as $car)
                                <li class="splide__slide px-3">
                                    <x-car-card :car="$car" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">Belum ada data mobil untuk ditampilkan.</p>
                </div>
            @endif
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('cars.index') }}"
                class="inline-flex items-center text-gray-300 font-bold hover:text-white transition-colors border-b border-brand-orange pb-1">
                Lihat Semua Koleksi
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </section>

    <section class="py-0 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="relative h-96 md:h-auto">
                <img src="https://images.unsplash.com/photo-1560252829-804f1aedf1be?q=80&w=1000&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover" alt="Jual Mobil">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="p-12 md:p-24 flex flex-col justify-center bg-gray-50">
                <span class="text-brand-orange font-bold uppercase tracking-widest text-xs mb-2">Ingin Ganti
                    Mobil?</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mb-6">Jual Mobil Lama Anda Dengan Harga
                    Terbaik</h2>
                <p class="text-gray-500 mb-8 leading-relaxed">
                    Jangan biarkan mobil lama Anda berdebu. Dapatkan penawaran instan dalam 30 menit. Kami membeli semua
                    merek dengan harga pasar yang wajar.
                </p>
                <div>
                    <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20menjual%20mobil%20saya"
                        target="_blank"
                        class="inline-flex items-center px-8 py-4 bg-brand-dark text-white font-bold rounded-xl hover:bg-brand-orange transition-all shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        Jual Mobil Saya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-24 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-brand-orange font-bold tracking-widest uppercase text-xs">Mudah & Cepat</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mt-2">Langkah Memiliki Mobil</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-100 z-0"></div>
                <div class="relative z-10 text-center group">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:border-brand-orange transition-colors duration-300">
                        <span
                            class="text-3xl font-black text-gray-300 group-hover:text-brand-orange transition-colors">01</span>
                    </div>
                    <h3 class="text-lg font-bold text-brand-dark mb-2">Pilih Mobil</h3>
                    <p class="text-sm text-gray-500 px-4">Cari mobil impian Anda melalui fitur pencarian lengkap kami.
                    </p>
                </div>
                <div class="relative z-10 text-center group">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:border-brand-orange transition-colors duration-300">
                        <span
                            class="text-3xl font-black text-gray-300 group-hover:text-brand-orange transition-colors">02</span>
                    </div>
                    <h3 class="text-lg font-bold text-brand-dark mb-2">Hubungi Kami</h3>
                    <p class="text-sm text-gray-500 px-4">Klik tombol WhatsApp untuk menanyakan ketersediaan dan
                        detail.</p>
                </div>
                <div class="relative z-10 text-center group">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:border-brand-orange transition-colors duration-300">
                        <span
                            class="text-3xl font-black text-gray-300 group-hover:text-brand-orange transition-colors">03</span>
                    </div>
                    <h3 class="text-lg font-bold text-brand-dark mb-2">Cek Unit & Deal</h3>
                    <p class="text-sm text-gray-500 px-4">Lihat mobil secara langsung, test drive, dan lakukan
                        pembayaran.</p>
                </div>
                <div class="relative z-10 text-center group">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:border-brand-orange transition-colors duration-300">
                        <span
                            class="text-3xl font-black text-gray-300 group-hover:text-brand-orange transition-colors">04</span>
                    </div>
                    <h3 class="text-lg font-bold text-brand-dark mb-2">Bawa Pulang</h3>
                    <p class="text-sm text-gray-500 px-4">Mobil siap diantar ke garasi rumah Anda dengan aman.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl" x-data="{ selected: null }">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brand-dark">Pertanyaan Umum</h2>
                <p class="text-gray-500 mt-2">Hal-hal yang sering ditanyakan pelanggan kami.</p>
            </div>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                    <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                        <span class="font-bold text-brand-dark">Apakah mobil di sini bergaransi?</span>
                        <svg :class="{ 'rotate-180': selected == 1 }"
                            class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="selected == 1" x-collapse class="px-6 pb-6 text-gray-500">
                        Ya, semua mobil yang dijual melalui cARImobil telah melalui inspeksi ketat dan dilengkapi dengan
                        garansi mesin & transmisi selama 1 tahun.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                        <span class="font-bold text-brand-dark">Bagaimana cara mengajukan kredit?</span>
                        <svg :class="{ 'rotate-180': selected == 2 }"
                            class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="selected == 2" x-collapse class="px-6 pb-6 text-gray-500">
                        Kami bekerja sama dengan berbagai leasing terpercaya. Silakan hubungi sales kami melalui
                        WhatsApp, dan kami akan membantu simulasi serta pengajuan kredit Anda.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                    <button @click="selected !== 3 ? selected = 3 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                        <span class="font-bold text-brand-dark">Apakah bisa tukar tambah?</span>
                        <svg :class="{ 'rotate-180': selected == 3 }"
                            class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="selected == 3" x-collapse class="px-6 pb-6 text-gray-500">
                        Tentu saja! Gunakan fitur "Jual Mobil" atau hubungi kami untuk mendapatkan penawaran harga
                        terbaik untuk mobil lama Anda sebagai uang muka mobil baru.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-brand-dark mb-12 text-center">Apa Kata Mereka?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="flex text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-600 mb-6 italic">"Proses cepat, mobil sesuai deskripsi. Gak nyesel beli di
                        sini."</p>
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                            BS</div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900">Budi Santoso</p>
                            <p class="text-xs text-gray-500">Pembeli Avanza</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="flex text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-600 mb-6 italic">"Adminnya ramah banget, dibantu urus surat-surat sampai beres.
                        Recommended!"</p>
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold">
                            SA</div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900">Sarah Amelia</p>
                            <p class="text-xs text-gray-500">Pembeli Brio</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="flex text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-600 mb-6 italic">"Harga transparan, gak ada biaya aneh-aneh. Mobil mulus
                        seperti baru."</p>
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold">
                            DN</div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900">Doni Nugraha</p>
                            <p class="text-xs text-gray-500">Pembeli Pajero</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="flex text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-600 mb-6 italic">"Pilihan mobilnya banyak dan berkualitas. Saya suka fitur
                        compare-nya."</p>
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold">
                            RZ</div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900">Riza Fahlevi</p>
                            <p class="text-xs text-gray-500">Pembeli Civic</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="flex text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-600 mb-6 italic">"Terima kasih cARImobil, akhirnya dapat mobil keluarga yang
                        pas di budget."</p>
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold">
                            WK</div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900">Wulan Kartika</p>
                            <p class="text-xs text-gray-500">Pembeli Xpander</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>
