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
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dummyImagePath = 'cars/dummy.jpg';

        $carsData = [
            ['brand' => 'Toyota', 'model' => 'Avanza Veloz 1.5 Q', 'year' => 2022, 'price' => 280000000, 'type' => 'MPV'],
            ['brand' => 'Toyota', 'model' => 'Fortuner VRZ GR Sport', 'year' => 2023, 'price' => 600000000, 'type' => 'SUV'],
            ['brand' => 'Honda', 'model' => 'Civic Turbo RS', 'year' => 2021, 'price' => 450000000, 'type' => 'Sedan'],
            ['brand' => 'Honda', 'model' => 'Brio Satya E CVT', 'year' => 2020, 'price' => 160000000, 'type' => 'City Car'],
            ['brand' => 'Mitsubishi', 'model' => 'Pajero Sport Dakar', 'year' => 2021, 'price' => 550000000, 'type' => 'SUV'],
            ['brand' => 'Mitsubishi', 'model' => 'Xpander Ultimate', 'year' => 2022, 'price' => 290000000, 'type' => 'MPV'],
            ['brand' => 'Suzuki', 'model' => 'Jimny 5 Door', 'year' => 2024, 'price' => 470000000, 'type' => 'SUV'],
            ['brand' => 'Hyundai', 'model' => 'Ioniq 5 Signature', 'year' => 2023, 'price' => 800000000, 'type' => 'Electric'],
            ['brand' => 'Wuling', 'model' => 'Air EV Long Range', 'year' => 2023, 'price' => 295000000, 'type' => 'Electric'],
            ['brand' => 'BMW', 'model' => '320i M Sport', 'year' => 2020, 'price' => 750000000, 'type' => 'Sedan'],
        ];

        $transmissions = ['Otomatis', 'Manual'];
        $conditions = ['Baru', 'Bekas'];
        $colors = ['Hitam', 'Putih', 'Silver', 'Abu-abu', 'Merah'];

        foreach ($carsData as $data) {
            // Cari ID Brand berdasarkan nama
            $brand = Brand::where('name', $data['brand'])->first();

            // Jika brand tidak ditemukan (misal typo), lewati
            if (!$brand)
                continue;

            // Buat Mobil
            $car = Car::create([
                'brand_id' => $brand->id,
                'model' => $data['model'],
                // slug akan otomatis dibuat oleh Trait Sluggable
                'year' => $data['year'],
                'price' => $data['price'],
                'condition' => $conditions[array_rand($conditions)], // Pilih acak
                'transmission' => $transmissions[array_rand($transmissions)], // Pilih acak
                'engine_capacity' => rand(1200, 2500) . 'cc',
                'mileage' => rand(5, 80) . '.000 km',
                'color' => $colors[array_rand($colors)],
                'description' => "Ini adalah mobil {$data['brand']} {$data['model']} tahun {$data['year']} yang sangat istimewa. Kondisi mesin terawat, body mulus, dan siap pakai luar kota. Dokumen lengkap dan pajak hidup.",
                'main_image' => $dummyImagePath,
            ]);

            // Buat 3 Gambar Galeri Tambahan(pakai dummy jpg)
            for ($i = 0; $i < 3; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'path' => $dummyImagePath,
                ]);
            }
        }
    }
}