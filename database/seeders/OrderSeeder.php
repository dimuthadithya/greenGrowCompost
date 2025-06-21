<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Clear the orders table first to ensure clean state
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Order::truncate();
        OrderItem::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $users = User::where('role', 'customer')->get();
        $products = Product::all();

        // Create 20 orders
        for ($i = 0; $i < 20; $i++) {
            $user = $users->random();
            $orderDate = now()->subDays(rand(1, 30));
            $status = $this->getRandomStatus();

            // Create a shipping address for the order
            $address = Address::create([
                'user_id' => $user->id,
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'address' => fake()->streetAddress(),
                'city' => fake()->city(),
                'state' => fake()->state(),
                'postal_code' => fake()->postcode(),
                'country' => 'IN', // India
                'phone' => fake()->phoneNumber(),
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Calculate order totals
            $subtotal = 0;
            $shipping = 5.00; // Fixed shipping cost

            // Create the order first with initial values
            $order = Order::create([
                'user_id' => $user->id,
                'address_id' => $address->id,
                'status' => $status,
                'subtotal' => 0,
                'tax' => 0,
                'shipping' => $shipping,
                'total' => 0,
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Add 1-5 items to each order
            $numberOfItems = rand(1, 5);

            for ($j = 0; $j < $numberOfItems; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;
                $itemSubtotal = $price * $quantity;
                $subtotal += $itemSubtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $itemSubtotal,
                    'created_at' => $orderDate,
                    'updated_at' => $orderDate,
                ]);
            }

            // Calculate tax and total
            $tax = $subtotal * 0.10; // 10% tax rate
            $total = $subtotal + $tax + $shipping;

            // Update the order with final totals
            $order->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
            ]);
        }
    }

    private function getRandomStatus(): string
    {
        // Define statuses and their weights
        $statuses = [
            'pending' => 20,
            'processing' => 30,
            'shipped' => 20,
            'delivered' => 20,
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

        return 'pending'; // Default status
    }
}
