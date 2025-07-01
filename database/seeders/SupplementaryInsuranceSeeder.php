<?php

namespace Database\Seeders;

use App\Models\Dependent;
use App\Models\Illness;
use App\Models\IllnessType;
use App\Models\SupplementaryInsuranceObligation;
use App\Models\SupplementaryInsurancePayment;
use App\Models\SupplementaryInsuranceValidity;
use Illuminate\Database\Seeder;

class SupplementaryInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dependent::factory()->count(5)->create();

        Illness::factory()->count(5)->create();
        IllnessType::factory()->count(5)->create();
        SupplementaryInsuranceObligation::factory()->count(15)->create();
        SupplementaryInsurancePayment::factory()->count(15)->create();
        SupplementaryInsuranceValidity::factory()->create();
    }
}
