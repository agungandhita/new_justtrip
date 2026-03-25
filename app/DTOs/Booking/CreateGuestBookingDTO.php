<?php

namespace App\DTOs\Booking;

readonly class CreateGuestBookingDTO
{
    public function __construct(
        public string $destinasiDicari,
        public string $namaLengkap,
        public string $email,
        public string $nomorTelepon,
        public string $alamat,
        public string $kota,
        public string $provinsi,
        public int $jumlahPeserta,
        public string $tanggalKeberangkatan,
        public bool $isCustomRequest = false,
        public ?string $layananId = null,
        public ?float $budgetEstimasi = null,
        public ?string $catatanTambahan = null,
    ) {}
}
