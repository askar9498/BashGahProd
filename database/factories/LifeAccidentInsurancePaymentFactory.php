<?php

namespace Database\Factories;

use App\Models\LifeAccidentInsurancePayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LifeAccidentInsurancePayment>
 */
class LifeAccidentInsurancePaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var User $user */
        $user = User::inRandomOrder()->first();
        return [
            'amount' => rand(1000000,10000000),
            'description' => $this->faker->realText(),
            'date' => $this->faker->dateTime(),
            'user_id' => $user->id
        ];
    }
}
