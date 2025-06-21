<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'slug' => Str::slug('Premium Organic Compost'),
                'description' => 'Our finest organic compost blend, perfect for all gardening needs',
                'price' => 19.99,
                'weight' => 20.00,
                'unit' => 'kg',
                'stock_quantity' => 100,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $compostCategoryId,
            ],
            [
                'name' => 'Composting Starter Kit',
                'description' => 'Everything you need to start composting at home',
                'price' => 49.99,
                'weight' => 5.00,
                'unit' => 'kg',
                'stock_quantity' => 50,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $toolsCategoryId,
            ],
            [
                'name' => 'Large Compost Bin',
                'description' => 'Heavy-duty compost bin for serious gardeners',
                'price' => 89.99,
                'weight' => 15.00,
                'unit' => 'kg',
                'stock_quantity' => 30,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $binsCategoryId,
            ],
            [
                'name' => 'Natural Worm Castings',
                'description' => 'Pure worm castings for superior soil amendment',
                'price' => 29.99,
                'weight' => 2.50,
                'unit' => 'kg',
                'stock_quantity' => 75,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $amendmentsCategoryId,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
