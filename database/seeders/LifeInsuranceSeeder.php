<?php

namespace Database\Seeders;

use App\Models\LifeInsuranceObligation;
use App\Models\LifeInsurancePayment;
use App\Models\LifeInsuranceValidity;
use Illuminate\Database\Seeder;

class LifeInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LifeInsuranceObligation::factory()->count(15)->create();
        LifeInsurancePayment::factory()->count(15)->create();
        LifeInsuranceValidity::factory()->create();
    }
}
