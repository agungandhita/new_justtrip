<?php

namespace App\Models\Content;

use Database\Factories\Content\NewsFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory, HasUuids;

    protected static function newFactory(): NewsFactory
    {
        return NewsFactory::new();
    }

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'ringkasan',
        'kategori',
        'gambar',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->judul);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->whereNotNull('published_at');
    }
}
