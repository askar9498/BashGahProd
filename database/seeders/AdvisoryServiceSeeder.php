<?php

namespace Database\Seeders;

use App\Models\AdvisoryContract;
use App\Models\AdvisoryRequest;
use App\Models\AdvisorySubject;
use Illuminate\Database\Seeder;

class AdvisoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdvisorySubject::factory()->count(5)->create();
        AdvisoryRequest::factory()->count(15)->create();
        AdvisoryContract::factory()->count(15)->create();
    }
}
