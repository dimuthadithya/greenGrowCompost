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
        $users = User::where('role', 'customer')->get();
        $products = Product::all();

        // Create 20 orders
        for ($i = 0; $i < 20; $i++) {
            $user = $users->random();
            $orderDate = now()->subDays(rand(1, 30));
            $orderNumber = 'GG' . str_pad($i + 1, 6, '0', STR_PAD_LEFT);
            $status = $this->getRandomStatus();

            // Calculate shipped_at and delivered_at based on status
            $shippedAt = null;
            $deliveredAt = null;

            if (in_array($status, ['shipped', 'delivered'])) {
                $shippedAt = $orderDate->copy()->addDays(rand(1, 3));
            }

            if ($status === 'delivered') {
                $deliveredAt = $shippedAt->copy()->addDays(rand(2, 5));
            }

            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $user->id,
                'status' => $status,
                'total_amount' => 0, // Will be calculated based on items
                'shipping_address' => fake()->streetAddress(),
                'shipping_city' => fake()->city(),
                'shipping_state' => fake()->state(),
                'shipping_postal_code' => fake()->postcode(),
                'shipping_phone' => fake()->phoneNumber(),
                'notes' => fake()->optional(0.3)->sentence(),
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
                'shipped_at' => $shippedAt,
                'delivered_at' => $deliveredAt,
            ]);

            // Add 1-5 items to each order
            $numberOfItems = rand(1, 5);
            $totalAmount = 0;

            for ($j = 0; $j < $numberOfItems; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;
                $subtotal = $price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
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
        // Define statuses and their weights
        $statuses = [
            'pending' => 20,
            'processing' => 30,
            'shipped' => 25,
            'delivered' => 15,
            'cancelled' => 10
        ];

        // Get random number between 0 and sum of all weights
        $total = array_sum($statuses);
        $random = mt_rand(1, $total);

        // Find the status that corresponds to the random number
        $current = 0;
        foreach ($statuses as $status => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $status;
            }
        }

        // Fallback (should never reach here)
        return 'pending';
    }
}
