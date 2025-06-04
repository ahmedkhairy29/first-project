<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DewaniyaCategory;

class DewaniyaCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['سياسة', 'ثقافة', 'رياضة'];

        foreach ($categories as $category) {
            DewaniyaCategory::updateOrCreate(['name' => $category]);
        }
    }
}
