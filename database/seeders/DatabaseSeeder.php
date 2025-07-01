<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CategorySeeder::class);

        $this->call(WelfareCardPaymentSeeder::class);
        $this->call(LifeInsuranceSeeder::class);
        $this->call(SupplementaryInsuranceSeeder::class);
        $this->call(LifeAccidentInsuranceSeeder::class);
        $this->call(AdvisoryServiceSeeder::class);
        $this->call(TravelFacilitySeeder::class);
        $this->call(PsychologicalServiceSeeder::class);
        $this->call(EducationalServiceSeeder::class);
    }
}
