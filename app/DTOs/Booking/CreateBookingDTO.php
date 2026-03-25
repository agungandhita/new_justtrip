<?php

namespace App\DTOs\Booking;

readonly class CreateBookingDTO
{
    public function __construct(
        public string $userId,
        public string $layananId,
        public int $jumlahPeserta,
        public string $tanggalKeberangkatan,
        public ?string $specialOfferId = null,
        public ?string $catatanKhusus = null,
    ) {}
}
