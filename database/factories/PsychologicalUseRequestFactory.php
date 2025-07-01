<?php

namespace Database\Factories;

use App\Enums\RequestStatuses;
use App\Models\PsychologicalCenter;
use App\Models\PsychologicalUseRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PsychologicalUseRequest>
 */
class PsychologicalUseRequestFactory extends Factory
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

        /** @var PsychologicalCenter $psychological_center */
        $psychological_center = PsychologicalCenter::inRandomOrder()->first();

        return [
            'center_id' => $psychological_center->id,
            'user_id' => $user->id,
            'date' => $this->faker->dateTime(),
            'status' => RequestStatuses::randomValue()
        ];
    }
}
