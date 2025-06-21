<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $compostCategoryId = ProductCategory::where('slug', 'compost')->first()->id;
        $toolsCategoryId = ProductCategory::where('slug', 'garden-tools')->first()->id;
        $binsCategoryId = ProductCategory::where('slug', 'composting-bins')->first()->id;
        $amendmentsCategoryId = ProductCategory::where('slug', 'soil-amendments')->first()->id;

        $products = [
            [
                'name' => 'Premium Organic Compost',
                'description' => 'Our finest organic compost blend, perfect for all gardening needs',
                'price' => 19.99,
                'stock' => 100,
                'product_category_id' => $compostCategoryId,
            ],
            [
                'name' => 'Composting Starter Kit',
                'description' => 'Everything you need to start composting at home',
                'price' => 49.99,
                'stock' => 50,
                'product_category_id' => $toolsCategoryId,
            ],
            [
                'name' => 'Large Compost Bin',
                'description' => 'Heavy-duty compost bin for serious gardeners',
                'price' => 89.99,
                'stock' => 30,
                'product_category_id' => $binsCategoryId,
            ],
            [
                'name' => 'Natural Worm Castings',
                'description' => 'Pure worm castings for superior soil amendment',
                'price' => 29.99,
                'stock' => 75,
                'product_category_id' => $amendmentsCategoryId,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
