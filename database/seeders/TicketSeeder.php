<?php

namespace Database\Seeders;

use App\Models\TicketDepartment;
use App\Models\TicketSubject;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketDepartment::factory()->create(['name'=>'مدیریت']);
        TicketDepartment::factory()->create(['name'=>'مالی']);
        TicketDepartment::factory()->create(['name' => 'پشتیبانی فنی']);

        TicketSubject::factory()->create(['name'=>'کارت رفاهی']);
        TicketSubject::factory()->create(['name'=>'بیمه عمر و سرمایه گذاری']);
        TicketSubject::factory()->create(['name'=>'بیمه عمر و حوادث']);
        TicketSubject::factory()->create(['name'=>'بیمه تکمیلی درمان']);
        TicketSubject::factory()->create(['name'=>'خدمات آموزشی']);
        TicketSubject::factory()->create(['name'=>'تسهیلات سفر']);
        TicketSubject::factory()->create(['name'=>'خدمات مشاوره']);
        TicketSubject::factory()->create(['name'=>'خدمات روانشناختی']);
        TicketSubject::factory()->create(['name'=>'مشکل فنی']);
        TicketSubject::factory()->create(['name'=>'سایر']);
    }
}
