<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman Tidak Ditemukan | cARImobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;800&display=swap');

        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>

<body class="bg-[#111] text-white overflow-hidden h-screen flex items-center justify-center relative">

    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1920&auto=format&fit=crop"
            class="w-full h-full object-cover blur-sm opacity-40" alt="Lost Car">
        <div class="absolute inset-0 bg-gradient-to-b from-[#111]/80 via-[#111]/50 to-[#111]"></div>
    </div>

    <div class="relative z-10 text-center px-6 max-w-2xl mx-auto">

        <h1
            class="text-[150px] font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#F47B20] to-orange-600 leading-none drop-shadow-2xl">
            404
        </h1>

        <div class="w-24 h-1 bg-[#F47B20] mx-auto mb-8 rounded-full"></div>

        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Oops! Anda Tersesat.
        </h2>

        <p class="text-gray-300 text-lg mb-10 leading-relaxed">
            Sepertinya mobil yang Anda cari sudah melaju pergi, atau halaman ini tidak pernah ada. Jangan khawatir, mari
            kita kembali ke jalan yang benar.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}"
                class="px-8 py-4 bg-[#F47B20] hover:bg-orange-600 text-white font-bold rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(244,123,32,0.4)] hover:shadow-[0_0_30px_rgba(244,123,32,0.6)] transform hover:-translate-y-1">
                Kembali ke Beranda
            </a>

            <a href="{{ route('cars.index') }}"
                class="px-8 py-4 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-full backdrop-blur-md transition-all duration-300">
                Cari Mobil Lain
            </a>
        </div>

    </div>

    <div class="absolute bottom-8 w-full text-center text-gray-500 text-xs uppercase tracking-widest">
        cARImobil &copy; {{ date('Y') }}
    </div>

</body>

</html>
