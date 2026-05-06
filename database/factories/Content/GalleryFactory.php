<?php

namespace Database\Factories\Content;

use App\Models\Content\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        $judul = $this->faker->sentence(4);

        return [
            'judul'         => $judul,
            'slug'          => Str::slug($judul) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'lokasi_tujuan' => $this->faker->randomElement(['Raja Ampat', 'Labuan Bajo', 'Bali', 'Bromo', 'Flores']),
            'deskripsi'     => $this->faker->paragraph(),
            'tanggal_trip'  => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'images'        => [],
            'main_image'    => null,
            'kategori'      => $this->faker->randomElement(['domestik', 'internasional']),
            'is_active'     => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
