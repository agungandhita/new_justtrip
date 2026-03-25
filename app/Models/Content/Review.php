<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'nama_reviewer',
        'rating',
        'komentar',
        'destinasi',
        'foto_reviewer',
        'is_active',
        'order_column',
    ];

    protected function casts(): array
    {
        return [
            'rating'       => 'integer',
            'is_active'    => 'boolean',
            'order_column' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_column');
    }
}
