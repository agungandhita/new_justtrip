<?php

namespace Database\Factories\Trip;

use App\Enums\JenisLayanan;
use App\Enums\LayananStatus;
use App\Enums\WilayahLayanan;
use App\Models\Trip\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Layanan>
 */
class LayananFactory extends Factory
{
    protected $model = Layanan::class;

    public function definition(): array
    {
        $nama = $this->faker->sentence(4);

        return [
            'nama_layanan'      => $nama,
            'slug'              => Str::slug($nama) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'jenis_layanan'     => JenisLayanan::OpenTrip,
            'wilayah'           => WilayahLayanan::Domestik,
            'lokasi_tujuan'     => $this->faker->randomElement(['Raja Ampat', 'Labuan Bajo', 'Bali', 'Lombok', 'Bromo']),
            'status'            => LayananStatus::Aktif,
            'deskripsi'         => $this->faker->paragraph(3),
            'gambar_destinasi'  => [],
            'gambar_utama'      => null,
            'durasi_hari'       => $this->faker->numberBetween(2, 10),
            'harga_per_orang'   => $this->faker->numberBetween(500_000, 5_000_000),
            'kuota_total'       => $this->faker->numberBetween(10, 50),
            'kuota_tersedia'    => $this->faker->numberBetween(5, 10),
            'tanggal_tersedia'  => [],
            'harga_group'       => [],
            'itinerary'         => [],
            'fasilitas_include' => ['Transportasi', 'Hotel', 'Makan'],
            'fasilitas_exclude' => ['Tiket pesawat', 'Oleh-oleh'],
            'syarat_ketentuan'  => [],
            'catatan'           => null,
        ];
    }

    public function openTrip(): static
    {
        return $this->state(fn () => ['jenis_layanan' => JenisLayanan::OpenTrip]);
    }

    public function privateTrip(): static
    {
        return $this->state(fn () => [
            'jenis_layanan' => JenisLayanan::PrivateTrip,
            'harga_group'   => [
                ['min_orang' => 2, 'max_orang' => 3, 'harga' => 3_000_000],
                ['min_orang' => 4, 'max_orang' => 6, 'harga' => 2_500_000],
            ],
        ]);
    }

    public function nonAktif(): static
    {
        return $this->state(fn () => ['status' => LayananStatus::NonAktif]);
    }
}
