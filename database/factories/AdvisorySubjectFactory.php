<?php

namespace Database\Factories;

use App\Models\AdvisorySubject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdvisorySubject>
 */
class AdvisorySubjectFactory extends Factory
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
