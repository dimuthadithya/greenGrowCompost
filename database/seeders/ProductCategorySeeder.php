<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Compost',
                'description' => 'High-quality organic compost for your garden',
                'slug' => 'compost',
            ],
            [
                'name' => 'Garden Tools',
                'description' => 'Essential tools for composting and gardening',
                'slug' => 'garden-tools',
            ],
            [
                'name' => 'Composting Bins',
                'description' => 'Various sizes of composting bins for home use',
                'slug' => 'composting-bins',
            ],
            [
                'name' => 'Soil Amendments',
                'description' => 'Natural soil amendments and fertilizers',
                'slug' => 'soil-amendments',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
