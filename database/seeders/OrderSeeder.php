<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $products = Product::all();

        // Create 20 orders
        for ($i = 0; $i < 20; $i++) {
            $user = $users->random();
            $orderDate = now()->subDays(rand(1, 30));

            $order = Order::create([
                'user_id' => $user->id,
                'status' => $this->getRandomStatus(),
                'total_amount' => 0, // Will be calculated based on items
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Add 1-5 items to each order
            $numberOfItems = rand(1, 5);
            $totalAmount = 0;

            for ($j = 0; $j < $numberOfItems; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'created_at' => $orderDate,
                    'updated_at' => $orderDate,
                ]);

                $totalAmount += ($price * $quantity);
            }

            // Update the order total
            $order->update([
                'total_amount' => $totalAmount,
            ]);
        }
    }

    private function getRandomStatus(): string
    {
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $weights = [2, 3, 4, 1]; // More likely to be completed or processing

        return $statuses[array_rand(array_combine($statuses, $weights))];
    }
}
