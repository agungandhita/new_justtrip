<?php

namespace Database\Factories\Content;

use App\Models\Content\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $judul = $this->faker->sentence(6);

        return [
            'judul'        => $judul,
            'slug'         => Str::slug($judul) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'konten'       => $this->faker->paragraphs(5, true),
            'ringkasan'    => $this->faker->paragraph(),
            'kategori'     => $this->faker->randomElement(['wisata', 'tips', 'budaya', 'kuliner']),
            'gambar'       => null,
            'is_published' => false,
            'published_at' => null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
