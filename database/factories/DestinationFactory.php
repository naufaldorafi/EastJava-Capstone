<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'city_id' => rand(1, 6),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
