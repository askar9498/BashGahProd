<?php

namespace Database\Factories;

use App\Models\SupplementaryInsuranceObligation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SupplementaryInsuranceObligation>
 */
class SupplementaryInsuranceObligationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->realText(),
            'amount' => rand(1000000, 10000000)
        ];
    }
}
