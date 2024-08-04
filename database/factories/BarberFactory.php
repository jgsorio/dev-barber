<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barber>
 */
class BarberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'stars' => $this->faker->randomDigit(),
            'latitude' => $this->faker->latitude(-23, -24.5),
            'longitude' => $this->faker->longitude(-46,-47.5),
        ];
    }
}