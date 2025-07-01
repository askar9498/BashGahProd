<?php

namespace Database\Seeders;

use App\Models\PsychologicalCenter;
use App\Models\PsychologicalUse;
use App\Models\PsychologicalUseRequest;
use Illuminate\Database\Seeder;

class PsychologicalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PsychologicalCenter::factory()->count(15)->create();
        PsychologicalUse::factory()->count(15)->create();
        PsychologicalUseRequest::factory()->count(10)->create();
    }
}
