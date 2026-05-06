<?php

namespace Database\Factories\Content;

use App\Models\Content\SpecialOffer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SpecialOffer>
 */
class SpecialOfferFactory extends Factory
{
    protected $model = SpecialOffer::class;

    public function definition(): array
    {
        $title         = $this->faker->sentence(4);
        $originalPrice = $this->faker->numberBetween(1_000_000, 10_000_000);
        $discountPct   = $this->faker->randomElement([10, 15, 20, 25, 30]);
        $discountedPrice = $originalPrice - ($originalPrice * $discountPct / 100);
        $validFrom     = now()->addDays($this->faker->numberBetween(0, 30));

        return [
            'layanan_id'          => null,
            'title'               => $title,
            'slug'                => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'description'         => $this->faker->paragraph(),
            'original_price'      => $originalPrice,
            'discounted_price'    => $discountedPrice,
            'discount_percentage' => $discountPct,
            'valid_from'          => $validFrom->toDateString(),
            'valid_until'         => $validFrom->copy()->addDays(30)->toDateString(),
            'is_active'           => true,
            'is_featured'         => false,
            'main_image'          => null,
            'images'              => [],
            'terms_conditions'    => null,
        ];
    }

    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
