<?php

namespace Database\Factories;

use App\Models\LifeInsuranceObligation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LifeInsuranceObligation>
 */
class LifeInsuranceObligationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description'=>$this->faker->realText(),
            'amount'=>rand(1000000,10000000)
        ];
    }
}
