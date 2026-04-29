<?php

namespace App\Models\Trip;

use App\Enums\JenisLayanan;
use App\Enums\LayananStatus;
use App\Enums\WilayahLayanan;
use App\Models\Booking\Booking;
use App\Models\Content\SpecialOffer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Layanan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'slug',
        'jenis_layanan',
        'wilayah',
        'lokasi_tujuan',
        'status',
        'deskripsi',
        'gambar_destinasi',
        'gambar_utama',
        'durasi_hari',
        'harga_per_orang',
        'kuota_total',
        'kuota_tersedia',
        'tanggal_tersedia',
        'harga_group',
        'itinerary',
        'fasilitas_include',
        'fasilitas_exclude',
        'syarat_ketentuan',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'jenis_layanan'     => JenisLayanan::class,
            'wilayah'           => WilayahLayanan::class,
            'status'            => LayananStatus::class,
            'gambar_destinasi'  => 'array',
            'tanggal_tersedia'  => 'array',
            'harga_group'       => 'array',
            'itinerary'         => 'array',
            'fasilitas_include' => 'array',
            'fasilitas_exclude' => 'array',
            'syarat_ketentuan'  => 'array',
            'harga_per_orang'   => 'decimal:2',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $layanan) {
            if (empty($layanan->slug)) {
                $layanan->slug = Str::slug($layanan->nama_layanan);
            }
        });
    }

    // ── Relationships ────────────────────────────────────────────────────────

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function specialOffers(): HasMany
    {
        return $this->hasMany(SpecialOffer::class);
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeAktif($query)
    {
        return $query->where('status', LayananStatus::Aktif);
    }

    public function scopeOpenTrip($query)
    {
        return $query->where('jenis_layanan', JenisLayanan::OpenTrip);
    }

    public function scopePrivateTrip($query)
    {
        return $query->where('jenis_layanan', JenisLayanan::PrivateTrip);
    }

    public function scopeRequestTrip($query)
    {
        return $query->where('jenis_layanan', JenisLayanan::RequestTrip);
    }

    public function scopeDomestik($query)
    {
        return $query->where('wilayah', WilayahLayanan::Domestik);
    }

    public function scopeInternasional($query)
    {
        return $query->where('wilayah', WilayahLayanan::Internasional);
    }

    // ── Accessors ────────────────────────────────────────────────────────────

    public function getHargaMulaiAttribute(): ?float
    {
        if ($this->jenis_layanan === JenisLayanan::OpenTrip) {
            return $this->harga_per_orang;
        }

        if ($this->jenis_layanan === JenisLayanan::PrivateTrip && ! empty($this->harga_group)) {
            return collect($this->harga_group)->min('harga');
        }

        return null;
    }

    public function getHargaFormatAttribute(): string
    {
        $harga = $this->harga_mulai;
        if ($harga === null) {
            return 'Hubungi Kami';
        }

        return 'Rp ' . number_format($harga, 0, ',', '.');
    }

    /**
     * Get price for a specific group size (private trip).
     */
    public function getHargaForGroup(int $jumlahOrang): ?float
    {
        if ($this->jenis_layanan !== JenisLayanan::PrivateTrip || empty($this->harga_group)) {
            return null;
        }

        foreach ($this->harga_group as $tier) {
            if ($jumlahOrang >= $tier['min_orang'] && $jumlahOrang <= $tier['max_orang']) {
                return (float) $tier['harga'];
            }
        }

        return null;
    }
}
