<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to proceed with checkout');
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $shipping = count($cart) > 0 ? 5.00 : 0;
        $tax = $total * 0.10;

        return view('checkout', compact('cart', 'total', 'shipping', 'tax'));
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to proceed with checkout');
        }

        // Get cart and check if it's empty
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty');
        }

        try {
            // Validate the form data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postal_code' => 'required|string|max:20',
                'country' => 'required|string|max:2',
                'phone' => 'required|string|max:20',
                'card_number' => ['required', 'string', 'regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/'],
                'expiry_date' => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
                'cvv' => ['required', 'string', 'regex:/^\d{3}$/'],
                'card_holder' => 'required|string|max:255'
            ]);

            DB::beginTransaction();

            // Create shipping address
            $address = Address::create([
                'user_id' => Auth::id(),
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'state' => $validatedData['state'],
                'postal_code' => $validatedData['postal_code'],
                'country' => $validatedData['country'],
                'phone' => $validatedData['phone'],
            ]);

            // Calculate totals
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $shipping = 5.00;
            $tax = $subtotal * 0.10;
            $total = $subtotal + $shipping + $tax;            // Create order with a unique order number
            $orderNumber = Order::generateUniqueOrderNumber();
            $order = Order::create([
                'user_id' => Auth::id(),
                'address_id' => $address->id,
                'total' => $total,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'status' => 'pending',
                'order_number' => $orderNumber,
            ]);

            // Create order items and validate stock
            foreach ($cart as $id => $item) {
                $product = \App\Models\Product::find($id);
                if (!$product) {
                    throw new \Exception("Product not found: {$id}");
                }

                if ($product->stock_quantity < $item['quantity']) {
                    throw new \Exception("Not enough stock for {$product->name}. Available: {$product->stock_quantity}, Requested: {$item['quantity']}");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);

                // Reduce stock
                $product->decrement('stock_quantity', $item['quantity']);
            }

            // Simulate payment processing
            // In a real application, you would integrate with a payment gateway here
            $order->update(['status' => 'processing']);

            // Clear cart
            session()->forget('cart');

            DB::commit();
            return redirect()->route('order.details', ['id' => $order->id])
                ->with('success', 'Your order has been placed successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Checkout validation failed: ' . json_encode($e->errors()));
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check your input and try again.');
        } catch (Exception $e) {
            // Log any other errors
            Log::error('Checkout failed: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            DB::rollback();

            // In development, show the actual error message for debugging
            $errorMessage = app()->environment('local')
                ? $e->getMessage()
                : 'There was a problem processing your order. Please try again.';

            return back()
                ->withInput()
                ->with('error', $errorMessage);
        }
    }
}
