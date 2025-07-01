<?php

namespace Database\Seeders;

use App\Models\LifeAccidentInsuranceObligation;
use App\Models\LifeAccidentInsurancePayment;
use App\Models\LifeAccidentInsuranceValidity;
use Illuminate\Database\Seeder;

class LifeAccidentInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LifeAccidentInsuranceObligation::factory()->count(15)->create();
        LifeAccidentInsurancePayment::factory()->count(15)->create();
        LifeAccidentInsuranceValidity::factory()->create();
    }
}
