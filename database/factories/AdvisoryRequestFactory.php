<?php

namespace Database\Factories;

use App\Enums\RequestStatuses;
use App\Models\AdvisoryRequest;
use App\Models\AdvisorySubject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdvisoryRequest>
 */
class AdvisoryRequestFactory extends Factory
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

        /** @var AdvisorySubject $subject */
        $subject = AdvisorySubject::inRandomOrder()->first();

        return [
            'time' => rand(20, 200),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'advisory_subject_id' => $subject->id,
            'status' => RequestStatuses::randomValue(),
            'user_id' => $user->id
        ];
    }
}
