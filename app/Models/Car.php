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
}
