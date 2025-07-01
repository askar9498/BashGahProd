<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WelfareCardPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WelfareCardPayment>
 */
class WelfareCardPaymentFactory extends Factory
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
            'amount' => rand(10000, 100000),
            'description' => $this->faker->realText(),
            'user_id' => $user->id,
            'date' => $this->faker->dateTime
        ];
    }
}
