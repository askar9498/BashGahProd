<?php

namespace Database\Seeders;

use App\Models\TravelFacilityUse;
use App\Models\TravelFacilityUseRequest;
use Illuminate\Database\Seeder;

class TravelFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TravelFacilityUse::factory()->count(15)->create();
        TravelFacilityUseRequest::factory()->count(15)->create();
    }
}
