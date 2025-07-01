<?php

namespace Database\Factories;

use App\Models\IllnessType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IllnessType>
 */
class IllnessTypeFactory extends Factory
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
