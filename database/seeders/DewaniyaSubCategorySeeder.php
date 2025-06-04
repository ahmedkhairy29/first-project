<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DewaniyaCategory;
use App\Models\DewaniyaSubCategory;

class DewaniyaSubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $subCategories = [
            'سياسة' => ['دولية', 'محلية'],
            'ثقافة' => ['كتب', 'فن'],
            'رياضة' => ['كرة قدم', 'كرة سلة'],
        ];

        foreach ($subCategories as $categoryName => $subs) {
            $category = DewaniyaCategory::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subs as $sub) {
                    DewaniyaSubCategory::updateOrCreate([
                        'dewaniya_category_id' => $category->id,
                        'name' => $sub
                    ]);
                }
            }
        }
    }
}
