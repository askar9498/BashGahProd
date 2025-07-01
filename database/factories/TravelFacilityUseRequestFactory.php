<?php

namespace Database\Factories;

use App\Enums\RequestStatuses;
use App\Models\City;
use App\Models\TravelFacilityUseRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TravelFacilityUseRequest>
 */
class TravelFacilityUseRequestFactory extends Factory
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
            'count' => rand(2, 10),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'city_id' => $city->id,
            'user_id' => $user->id,
            'status' => RequestStatuses::randomValue()
        ];
    }
}
