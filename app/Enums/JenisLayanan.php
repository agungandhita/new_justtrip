<?php

namespace App\Enums;

enum JenisLayanan: string
{
    case OpenTrip    = 'open_trip';
    case PrivateTrip = 'private_trip';
    case RequestTrip = 'request_trip';

    public function label(): string
    {
        return match ($this) {
            self::OpenTrip    => 'Open Trip',
            self::PrivateTrip => 'Private Trip',
            self::RequestTrip => 'Request Trip',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::OpenTrip    => 'info',
            self::PrivateTrip => 'success',
            self::RequestTrip => 'warning',
        };
    }

    public function hasWilayah(): bool
    {
        return $this !== self::RequestTrip;
    }
}
