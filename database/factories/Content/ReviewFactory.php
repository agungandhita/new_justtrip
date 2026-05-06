<?php

namespace Database\Factories\Content;

use App\Models\Content\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'nama_reviewer' => $this->faker->name(),
            'rating'        => $this->faker->numberBetween(1, 5),
            'komentar'      => $this->faker->paragraph(),
            'destinasi'     => $this->faker->randomElement(['Raja Ampat', 'Labuan Bajo', 'Bali', 'Lombok', 'Komodo']),
            'foto_reviewer' => null,
            'is_active'     => true,
            'order_column'  => $this->faker->numberBetween(1, 100),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
