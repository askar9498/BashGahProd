<?php

namespace Database\Seeders;

use App\Models\WelfareCardPayment;
use Illuminate\Database\Seeder;

class WelfareCardPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WelfareCardPayment::factory()->count(20)->create();
    }
}
