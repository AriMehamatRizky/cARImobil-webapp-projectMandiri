<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- 1. INI DITAMBAHKAN
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Car extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'brand_id',
        'model',
        'slug',
        'year',
        'price',
        'stock',
        'condition',
        'transmission',
        'engine_capacity',
        'mileage',
        'color',
        'description',
        'main_image',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['brand.name', 'model', 'year'] // Slug diambil dari gabungan Merek + Model + Tahun
            ]
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    public function getCarouselImages(): \Illuminate\Support\Collection
    {
        $gallery = $this->images->pluck('path');
        return $gallery->prepend($this->main_image);
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price >= 1000000000) {
            // Jika di atas 1 Miliar, bagi 1 Miliar dan tambah 'M'
            return 'Rp ' . str_replace('.', ',', (string)round($this->price / 1000000000, 2)) . ' M';
        } elseif ($this->price >= 1000000) {
            // Jika di atas 1 Juta, bagi 1 Juta dan tambah 'jt'
            return 'Rp ' . number_format($this->price / 1000000, 0) . ' jt';
        }

        // Jika di bawah 1 juta, tampilkan angka biasa
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
