<?php

namespace App\Models\Content;

use App\Models\Trip\Layanan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class SpecialOffer extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'layanan_id',
        'title',
        'slug',
        'description',
        'original_price',
        'discounted_price',
        'discount_percentage',
        'valid_from',
        'valid_until',
        'is_active',
        'is_featured',
        'main_image',
        'images',
        'terms_conditions',
    ];

    protected function casts(): array
    {
        return [
            'original_price'     => 'decimal:2',
            'discounted_price'   => 'decimal:2',
            'discount_percentage'=> 'decimal:2',
            'valid_from'         => 'date',
            'valid_until'        => 'date',
            'is_active'          => 'boolean',
            'is_featured'        => 'boolean',
            'images'             => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $offer) {
            if (empty($offer->slug)) {
                $offer->slug = Str::slug($offer->title);
            }
        });
    }

    // ── Relationships ────────────────────────────────────────────────────────

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeValid($query)
    {
        return $query->where('valid_until', '>=', now()->toDateString());
    }

    // ── Accessors ────────────────────────────────────────────────────────────

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->discounted_price, 0, ',', '.');
    }

    public function getFormattedOriginalPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->original_price, 0, ',', '.');
    }
}
