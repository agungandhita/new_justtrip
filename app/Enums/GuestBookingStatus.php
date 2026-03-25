<?php

namespace App\Enums;

enum GuestBookingStatus: string
{
    case Baru         = 'baru';
    case Diproses     = 'diproses';
    case Dikonfirmasi = 'dikonfirmasi';
    case Ditolak      = 'ditolak';
    case Selesai      = 'selesai';

    public function label(): string
    {
        return match ($this) {
            self::Baru         => 'Baru',
            self::Diproses     => 'Diproses',
            self::Dikonfirmasi => 'Dikonfirmasi',
            self::Ditolak      => 'Ditolak',
            self::Selesai      => 'Selesai',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Baru         => 'info',
            self::Diproses     => 'warning',
            self::Dikonfirmasi => 'success',
            self::Ditolak      => 'danger',
            self::Selesai      => 'success',
        };
    }
}
