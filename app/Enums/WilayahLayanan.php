<?php

namespace App\Enums;

enum WilayahLayanan: string
{
    case Domestik      = 'domestik';
    case Internasional = 'internasional';

    public function label(): string
    {
        return match ($this) {
            self::Domestik      => 'Domestik',
            self::Internasional => 'Internasional',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Domestik      => 'info',
            self::Internasional => 'success',
        };
    }
}
