<?php

namespace Database\Factories;

use App\Enums\GenderTypes;
use App\Enums\RelationshipTypes;
use App\Models\City;
use App\Models\Dependent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dependent>
 */
class DependentFactory extends Factory
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
        /** @var City $city */
        $city = City::inRandomOrder()->first();

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'national_id' => rand(1000000000, 9999999999),
            'relationship' => RelationshipTypes::randomValue(),
            'gender' => GenderTypes::randomValue(),
            'birth_date' => $this->faker->dateTime,
            'father_name' => $this->faker->firstName,
            'supervisor_id' => $user->id,
            'birth_city_id' => $city->id,
            'insured_code' => rand(100000000, 999999999),
            'cellphone' => $this->faker->phoneNumber,
            'is_supplementary_insuranced' => rand(0,1),
            'birth_certificate_number' => rand(1000000000, 9999999999)
        ];
    }
}
