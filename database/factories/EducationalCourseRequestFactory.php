<?php

namespace Database\Factories;

use App\Enums\RequestStatuses;
use App\Models\EducationalCourseRequest;
use App\Models\EducationalSubject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EducationalCourseRequest>
 */
class EducationalCourseRequestFactory extends Factory
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

        /** @var EducationalSubject $subject */
        $subject = EducationalSubject::inRandomOrder()->first();

        return [
            'time' => rand(20,200),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'educational_subject_id' => $subject->id,
            'status' => RequestStatuses::randomValue(),
            'user_id' =>$user->id
        ];
    }
}
