<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
            'description' => $this->faker->text(),
            'address' => $this->faker->address(),
            'main_colour' => $this->faker->hexColor(),
            'secondary_colour' => $this->faker->hexColor(),
        ];
    }
}
