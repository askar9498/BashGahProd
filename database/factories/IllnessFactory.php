<?php

namespace Database\Factories;

use App\Models\Illness;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Illness>
 */
class IllnessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->lastName
        ];
    }
}
