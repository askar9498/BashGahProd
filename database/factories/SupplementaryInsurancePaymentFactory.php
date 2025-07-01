<?php

namespace Database\Factories;

use App\Enums\SupplementaryInsurancePaymentType;
use App\Models\Dependent;
use App\Models\Illness;
use App\Models\IllnessType;
use App\Models\SupplementaryInsurancePayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SupplementaryInsurancePayment>
 */
class SupplementaryInsurancePaymentFactory extends Factory
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
        /** @var Dependent $dependent */
        $dependent = Dependent::whereSupervisorId($user->id)->whereIsSupplementaryInsuranced(true)->inRandomOrder()->first();

        /** @var Illness $illness */
        $illness = Illness::query()->inRandomOrder()->first();

        /** @var IllnessType $illness_type */
        $illness_type = IllnessType::query()->inRandomOrder()->first();

        return [
            'type' => SupplementaryInsurancePaymentType::randomValue(),
            'user_id' => $user->id,
            'dependent_id' => $dependent->id,
            'amount' => rand(1000000, 10000000),
            'medical_center' => $this->faker->name(),
            'illness_date' => $this->faker->dateTime(),
            'remittance_date' => $this->faker->dateTime(),
            'register_date' => $this->faker->dateTime(),
            'validity_date' => $this->faker->dateTime(),
            'illness_id' => $illness->id,
            'illness_type_id' => $illness_type->id
        ];
    }
}
