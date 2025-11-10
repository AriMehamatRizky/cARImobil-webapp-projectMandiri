<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
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

        // Tambahkan 'main_image' ke awal collection
        return $gallery->prepend($this->main_image);
    }
}
