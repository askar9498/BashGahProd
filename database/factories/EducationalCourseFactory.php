<?php

namespace Database\Factories;

use App\Models\EducationalCourse;
use App\Models\EducationalSubject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EducationalCourse>
 */
class EducationalCourseFactory extends Factory
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
            'user_id' =>$user->id
        ];
    }
}
