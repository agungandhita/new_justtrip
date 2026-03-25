<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending   => 'Menunggu Konfirmasi',
            self::Approved  => 'Disetujui',
            self::Rejected  => 'Ditolak',
            self::Cancelled => 'Dibatalkan',
            self::Completed => 'Selesai',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending   => 'warning',
            self::Approved  => 'info',
            self::Rejected  => 'danger',
            self::Cancelled => 'danger',
            self::Completed => 'success',
        };
    }
}
