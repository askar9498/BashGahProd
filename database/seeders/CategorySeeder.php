<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(['title' => 'کارت رفاهی', 'can_delete' => false]);
        Category::factory()->create(['title' => 'بیمه عمر و سرمایه گذاری', 'can_delete' => false]);
        Category::factory()->create(['title' => 'بیمه عمر و حوادث', 'can_delete' => false]);
        Category::factory()->create(['title' => 'بیمه تکمیلی', 'can_delete' => false]);
        Category::factory()->create(['title' => 'خدمات مشاوره ای', 'can_delete' => false]);
        Category::factory()->create(['title' => 'خدمات آموزشی', 'can_delete' => false]);
        Category::factory()->create(['title' => 'تسهیلات سفر', 'can_delete' => false]);
        Category::factory()->create(['title' => 'خدمات روانشتاختی', 'can_delete' => false]);
    }
}
