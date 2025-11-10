import './bootstrap';

import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';

window.Alpine = Alpine;
Alpine.start();

// Inisialisasi semua Splide carousel saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {

    // Untuk carousel utama (misal: di landing page)
    document.querySelectorAll('.splide-main').forEach(carousel => {
        new Splide(carousel, {
            type: 'loop',
            perPage: 4, // Tampilkan 4
            perMove: 1,
            gap: '1.5rem',
            pagination: false, // Sembunyikan titik-titik
            autoplay: true,
            breakpoints: {
                1024: {
                    perPage: 3,
                },
                768: {
                    perPage: 2,
                },
                640: {
                    perPage: 1,
                },
            },
        }).mount();
    });

    // Untuk carousel di dalam card mobil
    document.querySelectorAll('.splide-card').forEach(carousel => {
        new Splide(carousel, {
            type: 'fade', // Efek fade
            rewind: true,
            pagination: true, // Tampilkan titik-titik
            arrows: false, // Sembunyikan panah
            width: '100%',
            height: '224px', // Sesuaikan dengan tinggi gambar di card (h-56)
        }).mount();
    });

    // Untuk galeri di halaman detail mobil
    document.querySelectorAll('.splide-detail-main').forEach(main => {
        const thumbnails = new Splide('.splide-detail-thumbnail', {
            rewind: true,
            fixedWidth: 100,
            fixedHeight: 64,
            isNavigation: true,
            gap: 10,
            focus: 'center',
            pagination: false,
            cover: true,
            arrows: false,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
            breakpoints: {
                640: {
                    fixedWidth: 80,
                    fixedHeight: 50,
                },
            },
        });

        const mainSplide = new Splide(main, {
            type: 'fade',
            rewind: true,
            pagination: false,
            arrows: true,
        });

        mainSplide.sync(thumbnails);
        mainSplide.mount();
        thumbnails.mount();
    });
});