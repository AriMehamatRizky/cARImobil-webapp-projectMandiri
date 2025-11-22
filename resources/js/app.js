import './bootstrap';

import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

window.Alpine = Alpine;
Alpine.start();

// Inisialisasi semua Splide carousel saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {

    const mainCarousels = document.querySelectorAll('.splide-main');

    mainCarousels.forEach(carousel => {
        new Splide(carousel, {
            type: 'loop',
            drag: 'free', // Agar user bisa geser manual dengan bebas
            focus: 'center',
            perPage: 3,
            gap: '2rem',
            pagination: false,
            arrows: false,

            // Konfigurasi Auto Scroll
            autoScroll: {
                speed: 1,
                pauseOnHover: true, // Berhenti saat mouse diarahkan ke mobil
                rewind: false,
            },

            breakpoints: {
                1024: { perPage: 2, gap: '1.5rem' },
                640: { perPage: 1, gap: '1rem' },
            },
        }).mount({ AutoScroll });
    });

    // Untuk carousel di dalam card mobil
    document.querySelectorAll('.splide-card').forEach(carousel => {
        new Splide(carousel, {
            type: 'fade',
            rewind: true,
            pagination: false,
            arrows: false,
            cover: true,
            height: '240px',
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