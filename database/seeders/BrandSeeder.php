<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar Merek yang ingin kita masukkan
        $brands = [
            'Toyota',
            'Honda',
            'Daihatsu',
            'Suzuki',
            'Mitsubishi',
            'Nissan',
            'Hyundai',
            'Wuling',
            'Mazda',
            'BMW',
            'Mercedes-Benz',
            'Porsche',
            'Ferrari',
            'BYD',
            'Bentley',
            'Audi',
            'Aston Martin',
            'Lamborghini',
            'Land Rover',
            'Lexus',
            'Mazda',
            'McLaren',
            'Rolls-Royce',
            'Tesla',
            'Subaru',
        ];

        foreach ($brands as $brandName) {
            Brand::create([
                'name' => $brandName,
                'slug' => Str::slug($brandName),
            ]);
        }
    }
}