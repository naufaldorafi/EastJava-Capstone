<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Destination;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $destination_id = rand(1, 10);
        $destination = Destination::find($destination_id);
        $quantity = rand(1, 10);
        $total_price = $destination ? $destination->price * $quantity : 0;

        return [
            'destination_id' => $destination_id,
            'user_id' => rand(1, 10),
            'created_at' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d'),
            'booking_date' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d'),
            'quantity' => $quantity,
            'total_price' => $total_price,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
