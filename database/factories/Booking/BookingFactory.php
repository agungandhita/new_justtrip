<?php

namespace Database\Factories\Booking;

use App\Enums\BookingStatus;
use App\Models\Booking\Booking;
use App\Models\Trip\Layanan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $user = User::factory()->make();

        return [
            'booking_number'        => 'JT' . now()->format('ymd') . strtoupper(Str::random(5)),
            'user_id'               => User::factory(),
            'layanan_id'            => Layanan::factory(),
            'special_offer_id'      => null,
            'status'                => BookingStatus::Pending,
            'jumlah_peserta'        => $this->faker->numberBetween(1, 10),
            'tanggal_keberangkatan' => $this->faker->dateTimeBetween('+7 days', '+3 months')->format('Y-m-d'),
            'total_amount'          => $this->faker->numberBetween(1_000_000, 20_000_000),
            'original_amount'       => $this->faker->numberBetween(1_000_000, 20_000_000),
            'discount_amount'       => 0,
            'catatan_khusus'        => null,
            'customer_info'         => [
                'name'    => $this->faker->name(),
                'email'   => $this->faker->email(),
                'phone'   => $this->faker->phoneNumber(),
                'address' => $this->faker->address(),
            ],
            'admin_notes'      => null,
            'rejection_reason' => null,
            'approved_by'      => null,
            'approved_at'      => null,
            'rejected_at'      => null,
            'completed_at'     => null,
            'cancelled_at'     => null,
        ];
    }

    public function approved(): static
    {
        return $this->state(fn () => [
            'status'      => BookingStatus::Approved,
            'approved_at' => now(),
        ]);
    }

    public function completed(): static
    {
        return $this->state(fn () => [
            'status'       => BookingStatus::Completed,
            'completed_at' => now(),
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn () => [
            'status'       => BookingStatus::Cancelled,
            'cancelled_at' => now(),
        ]);
    }
}
