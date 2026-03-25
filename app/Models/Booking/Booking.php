<?php

namespace App\Models\Booking;

use App\Enums\BookingStatus;
use App\Models\Content\SpecialOffer;
use App\Models\Trip\Layanan;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_number',
        'user_id',
        'layanan_id',
        'special_offer_id',
        'status',
        'jumlah_peserta',
        'tanggal_keberangkatan',
        'total_amount',
        'original_amount',
        'discount_amount',
        'catatan_khusus',
        'customer_info',
        'admin_notes',
        'rejection_reason',
        'approved_by',
        'approved_at',
        'rejected_at',
        'completed_at',
        'cancelled_at',
    ];

    protected function casts(): array
    {
        return [
            'status'               => BookingStatus::class,
            'customer_info'        => 'array',
            'tanggal_keberangkatan'=> 'date',
            'total_amount'         => 'decimal:2',
            'original_amount'      => 'decimal:2',
            'discount_amount'      => 'decimal:2',
            'approved_at'          => 'datetime',
            'rejected_at'          => 'datetime',
            'completed_at'         => 'datetime',
            'cancelled_at'         => 'datetime',
        ];
    }

    // ── Relationships ────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    public function specialOffer(): BelongsTo
    {
        return $this->belongsTo(SpecialOffer::class, 'special_offer_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopePending($query)
    {
        return $query->where('status', BookingStatus::Pending);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', BookingStatus::Approved);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', [BookingStatus::Pending, BookingStatus::Approved]);
    }

    // ── Accessors ────────────────────────────────────────────────────────────

    public function getStatusLabelAttribute(): string
    {
        return $this->status->label();
    }

    public function getStatusColorAttribute(): string
    {
        return $this->status->color();
    }

    public function getFormattedTotalAmountAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->total_amount, 0, ',', '.');
    }

    public function getFormattedTanggalKeberangkatanAttribute(): string
    {
        return $this->tanggal_keberangkatan->format('d F Y');
    }
}
