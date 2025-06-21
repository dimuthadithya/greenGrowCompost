<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $users = User::where('role', 'customer')->get();

        foreach ($products as $product) {
            // Create 3-5 reviews for each product
            $numberOfReviews = rand(3, 5);

            for ($i = 0; $i < $numberOfReviews; $i++) {
                ProductReview::create([
                    'product_id' => $product->id,
                    'user_id' => $users->random()->id,
                    'rating' => rand(3, 5), // Mostly positive reviews
                    'comment' => $this->getRandomReview(),
                ]);
            }
        }
    }

    private function getRandomReview(): string
    {
        $reviews = [
            'Great product, exactly what I needed for my garden!',
            'Very satisfied with the quality. Will buy again.',
            'Exceeded my expectations. Highly recommended!',
            'Good value for money. Fast delivery too.',
            'Works perfectly for my composting needs.',
            'Quality product, sturdy and well-made.',
            'Makes composting so much easier!',
            'Excellent product, great customer service.',
            'Really happy with this purchase.',
            'Perfect for my garden. Great results!',
        ];

        return $reviews[array_rand($reviews)];
    }
}
