<?php

namespace App\Models\Content;

use Database\Factories\Content\GalleryFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory, HasUuids;

    protected static function newFactory(): GalleryFactory
    {
        return GalleryFactory::new();
    }

    protected $fillable = [
        'judul',
        'slug',
        'lokasi_tujuan',
        'deskripsi',
        'tanggal_trip',
        'images',
        'main_image',
        'kategori',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'images'      => 'array',
            'is_active'   => 'boolean',
            'tanggal_trip'=> 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $gallery) {
            if (empty($gallery->slug)) {
                $gallery->slug = Str::slug($gallery->judul);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
