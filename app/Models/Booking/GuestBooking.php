<?php

namespace App\Models\Booking;

use App\Enums\GuestBookingStatus;
use App\Models\Trip\Layanan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestBooking extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'guest_booking_id';

    protected $fillable = [
        'booking_number',
        'layanan_id',
        'destinasi_dicari',
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'alamat',
        'kota',
        'provinsi',
        'jumlah_peserta',
        'tanggal_keberangkatan_diinginkan',
        'budget_estimasi',
        'is_custom_request',
        'status',
        'catatan_tambahan',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'status'                          => GuestBookingStatus::class,
            'is_custom_request'               => 'boolean',
            'budget_estimasi'                 => 'decimal:2',
            'tanggal_keberangkatan_diinginkan'=> 'date',
        ];
    }

    // ── Relationships ────────────────────────────────────────────────────────

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeBaru($query)
    {
        return $query->where('status', GuestBookingStatus::Baru);
    }

    // ── Accessors ────────────────────────────────────────────────────────────

    public function getStatusLabelAttribute(): string
    {
        return $this->status->label();
    }

    public function getFormattedBudgetAttribute(): string
    {
        if ($this->budget_estimasi === null) {
            return 'Tidak ditentukan';
        }

        return 'Rp ' . number_format((float) $this->budget_estimasi, 0, ',', '.');
    }
}
