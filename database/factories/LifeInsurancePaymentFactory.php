<?php

namespace Database\Factories;

use App\Models\LifeInsurancePayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LifeInsurancePayment>
 */
class LifeInsurancePaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'description' => $this->faker->realText(),
            'amount' => rand(100000, 1000000),
            'date' => $this->faker->dateTime(),
            'user_id' => $user->id
        ];
    }
}
