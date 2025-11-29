<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarImage;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $carsData = [

            [
                'brand' => 'Porsche',
                'model' => '911 Targa 4S Heritage Design Edition - 992.1',
                'year' => 2021,
                'price' => 6500000000,
                'type' => 'Sport',
                'color' => 'Cherry Metallic',
                'transmission' => 'Otomatis',
                'engine' => '3.0L Twin-Turbo',
                'condition' => 'Bekas',
                'mileage' => '5.000 km',
                'image' => 'cars/targa_4s_heritage1.webp',
                'gallery' => [
                    'cars/targa 4s heritage 2.webp',
                    'cars/targa 4s heritage 3.webp',
                    'cars/targa 4s heritage 4.webp',
                    'cars/targa 4s heritage 5.webp',
                    'cars/targa 4s heritage 6.webp',
                    'cars/targa 4s heritage 7.webp',
                    'cars/targa 4s heritage 8.webp',

                ]
            ],
            [
                'brand' => 'Aston Martin',
                'model' => 'Vantage F1® Edition Roadster',
                'year' => 2023,
                'price' => 9000000000,
                'type' => 'Sport',
                'color' => 'Racing Green',
                'transmission' => 'Otomatis',
                'engine' => '4.0L V8 Twin-Turbo',
                'condition' => 'Baru',
                'mileage' => '0 km',
                'image' => 'cars/2023 Aston Martin Vantage F1 Edition Roadster 1.webp',
                'gallery' => [
                    'cars/2023 Aston Martin Vantage F1 Edition Roadster 2.webp',
                    'cars/2023 Aston Martin Vantage F1 Edition Roadster 3.webp',
                    'cars/2023 Aston Martin Vantage F1 Edition Roadster 4.webp',
                    'cars/2023 Aston Martin Vantage F1 Edition Roadster 5.webp',
                    'cars/2023 Aston Martin Vantage F1 Edition Roadster 6.webp',
                ]
            ],
            [
                'brand' => 'Porsche',
                'model' => '911 Carrera (992.2)',
                'year' => 2025,
                'price' => 5800000000,
                'type' => 'Sport',
                'color' => 'Guards Red',
                'transmission' => 'Otomatis',
                'engine' => '3.0L Twin-Turbo Boxer 6',
                'condition' => 'Baru',
                'mileage' => '0 km',
                'image' => 'cars/porsche 911 carrera 1.webp',
                'gallery' => [
                    'cars/porsche 911 carrera 2.webp',
                    'cars/porsche 911 carrera 3.webp',
                    'cars/porsche 911 carrera 4.webp',
                ]
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Avanza Veloz 1.5 Q',
                'year' => 2022,
                'price' => 280000000,
                'image' => 'cars/toyota avanza veloz 15.jpg',
                'type' => 'MPV'
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Fortuner VRZ GR Sport',
                'year' => 2023,
                'price' => 600000000,
                'image' => 'cars/fortuner vrz gr sport 2023.jpg',
                'type' => 'SUV'
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic Turbo RS',
                'year' => 2021,
                'price' => 450000000,
                'image' => 'cars/civic turbo rs.jpg',
                'type' => 'Sedan'
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio Satya E CVT',
                'year' => 2020,
                'price' => 160000000,
                'image' => 'cars/brio satya.jpg',
                'type' => 'City Car'
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Pajero Sport Dakar',
                'year' => 2021,
                'price' => 550000000,
                'image' => 'cars/pajero sport dakar.jpg',
                'type' => 'SUV'
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander Ultimate',
                'year' => 2022,
                'price' => 290000000,
                'image' => 'cars/xpander.jpg',
                'type' => 'MPV'
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'Jimny 5 Door',
                'year' => 2024,
                'price' => 470000000,
                'image' => 'cars/jimny.jpg',
                'type' => 'SUV'
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Ioniq 5 Signature',
                'year' => 2023,
                'price' => 800000000,
                'image' => 'cars/ionic 5.jpg',
                'type' => 'Electric'
            ],
            [
                'brand' => 'Wuling',
                'model' => 'Air EV Long Range',
                'year' => 2023,
                'price' => 295000000,
                'image' => 'cars/wuling air ev.jpg',
                'type' => 'Electric'
            ],
            [
                'brand' => 'BMW',
                'model' => '320i M Sport',
                'year' => 2020,
                'price' => 750000000,
                'image' => 'cars/bmw 320i m sport.jpg',
                'type' => 'Sedan'
            ],
        ];

        // Array Helper untuk data random mobil harian
        $transmissions = ['Otomatis', 'Manual'];
        $conditions = ['Baru', 'Bekas'];
        $colors = ['Hitam', 'Putih', 'Silver', 'Abu-abu', 'Merah'];

        foreach ($carsData as $data) {
            $brand = Brand::where('name', $data['brand'])->first();
            if (!$brand)
                continue;

            $car = Car::create([
                'brand_id' => $brand->id,
                'model' => $data['model'],
                'year' => $data['year'],
                'slug' => Str::slug($data['model']) . '-' . Str::random(5),
                'price' => $data['price'],
                // Pakai data spesifik jika ada, kalau tidak pakai random
                'condition' => $data['condition'] ?? $conditions[array_rand($conditions)],
                'transmission' => $data['transmission'] ?? $transmissions[array_rand($transmissions)],
                'engine_capacity' => $data['engine'] ?? rand(1200, 2500) . 'cc',
                'mileage' => $data['mileage'] ?? (rand(5, 80) . '.000 km'),
                'color' => $data['color'] ?? $colors[array_rand($colors)],
                'description' => "Unit {$data['brand']} {$data['model']} ini tersedia di showroom kami. Kondisi sangat terawat, dokumen lengkap, dan siap pakai.",
                'main_image' => $data['image'],
                'stock' => 1, // Default stok 1
            ]);

            if (isset($data['gallery']) && is_array($data['gallery'])) {
                foreach ($data['gallery'] as $galleryPath) {
                    CarImage::create([
                        'car_id' => $car->id,
                        'path' => $galleryPath,
                    ]);
                }
            }
        }
    }
}