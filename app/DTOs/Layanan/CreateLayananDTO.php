<?php

namespace App\DTOs\Layanan;

use Illuminate\Http\Request;

readonly class CreateLayananDTO
{
    public function __construct(
        public string $nama_layanan,
        public string $jenis_layanan,
        public ?string $wilayah,
        public string $lokasi_tujuan,
        public string $status,
        public ?string $deskripsi,
        public ?int $durasi_hari,
        public ?float $harga_per_orang,
        public ?int $kuota_total,
        public ?int $kuota_tersedia,
        public array $tanggal_tersedia,
        public array $harga_group,
        public array $itinerary,
        public array $fasilitas_include,
        public array $fasilitas_exclude,
        public ?string $catatan,
        public mixed $gambar_utama,
        public array $gambar_destinasi,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $fasilitasInclude = [];
        if ($request->filled('fasilitas_include')) {
            $fasilitasInclude = array_values(array_filter(array_map('trim', explode("\n", $request->input('fasilitas_include')))));
        }

        $fasilitasExclude = [];
        if ($request->filled('fasilitas_exclude')) {
            $fasilitasExclude = array_values(array_filter(array_map('trim', explode("\n", $request->input('fasilitas_exclude')))));
        }

        $tanggalTersedia = [];
        if ($request->filled('tanggal_tersedia')) {
            $tanggalTersedia = array_values(array_filter(array_map('trim', explode(",", str_replace("\n", ",", $request->input('tanggal_tersedia'))))));
        }

        $hargaGroup = [];
        if ($request->input('jenis_layanan') === 'private_trip') {
            $tiers = [
                ['key' => 'harga_2_3', 'min' => 2, 'max' => 3],
                ['key' => 'harga_5_6', 'min' => 5, 'max' => 6],
                ['key' => 'harga_9_10', 'min' => 9, 'max' => 10],
                ['key' => 'harga_13_15', 'min' => 13, 'max' => 15],
                ['key' => 'harga_18_20', 'min' => 18, 'max' => 20],
                ['key' => 'harga_30_35', 'min' => 30, 'max' => 35],
                ['key' => 'harga_50_59', 'min' => 50, 'max' => 59],
            ];
            foreach ($tiers as $tier) {
                if ($request->filled($tier['key'])) {
                    $hargaGroup[] = [
                        'min_orang' => $tier['min'],
                        'max_orang' => $tier['max'],
                        'harga'     => $request->input($tier['key'])
                    ];
                }
            }
        }

        return new self(
            nama_layanan: $request->input('nama_layanan'),
            jenis_layanan: $request->input('jenis_layanan'),
            wilayah: $request->input('wilayah'),
            lokasi_tujuan: $request->input('lokasi_tujuan'),
            status: $request->input('status'),
            deskripsi: $request->input('deskripsi'),
            durasi_hari: $request->input('durasi_hari'),
            harga_per_orang: $request->input('harga_per_orang'),
            kuota_total: $request->input('kuota_maksimal'),
            kuota_tersedia: $request->input('kuota_maksimal'),
            tanggal_tersedia: $tanggalTersedia,
            harga_group: $hargaGroup,
            itinerary: $request->input('itinerary') ?? [],
            fasilitas_include: $fasilitasInclude,
            fasilitas_exclude: $fasilitasExclude,
            catatan: $request->input('catatan_penting'),
            gambar_utama: $request->file('gambar_utama'),
            gambar_destinasi: $request->hasFile('gambar_destinasi') ? $request->file('gambar_destinasi') : [],
        );
    }
}
