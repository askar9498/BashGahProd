<?php

namespace Database\Factories;

use App\Models\EducationalSubject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EducationalSubject>
 */
class EducationalSubjectFactory extends Factory
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
