<?php

namespace Database\Seeders;

use App\Models\EducationalCourse;
use App\Models\EducationalCourseRequest;
use App\Models\EducationalSubject;
use Illuminate\Database\Seeder;

class EducationalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationalSubject::factory()->count(5)->create();
        EducationalCourseRequest::factory()->count(15)->create();
        EducationalCourse::factory()->count(15)->create();
    }
}
