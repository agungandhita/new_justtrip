<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case User  = 'user';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::User  => 'Pengguna',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Admin => 'danger',
            self::User  => 'info',
        };
    }
}
