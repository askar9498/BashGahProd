<?php

namespace Database\Factories;

use App\Models\PsychologicalCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PsychologicalCenter>
 */
class PsychologicalCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
