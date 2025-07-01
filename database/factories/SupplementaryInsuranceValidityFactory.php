<?php

namespace Database\Factories;

use App\Models\SupplementaryInsuranceValidity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SupplementaryInsuranceValidity>
 */
class SupplementaryInsuranceValidityFactory extends Factory
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
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'user_id' => $user->id
        ];
    }
}
