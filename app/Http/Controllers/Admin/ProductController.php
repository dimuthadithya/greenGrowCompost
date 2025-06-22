<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'The product name is required',
            'name.max' => 'The product name cannot be longer than 255 characters',
            'description.required' => 'The product description is required',
            'price.required' => 'The product price is required',
            'price.numeric' => 'The price must be a valid number',
            'price.min' => 'The price cannot be negative',
            'stock_quantity.required' => 'The stock quantity is required',
            'stock_quantity.integer' => 'The stock quantity must be a whole number',
            'stock_quantity.min' => 'The stock quantity cannot be negative',
            'weight.required' => 'The product weight is required',
            'weight.numeric' => 'The weight must be a valid number',
            'weight.min' => 'The weight cannot be negative',
            'unit.required' => 'Please select a unit of measurement',
            'unit.in' => 'Please select a valid unit (kg, g, lb, or oz)',
            'is_featured.boolean' => 'The featured status must be true or false',
            'is_active.boolean' => 'The active status must be true or false',
        ];

        // Convert checkbox values to boolean
        $request->merge([
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ]);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'unit' => 'required|in:kg,g,lb,oz',
            'category_id' => 'required|exists:product_categories,id',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|max:2048'
        ], $messages);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Set boolean fields
            $validated['is_featured'] = $request->boolean('is_featured', false);
            $validated['is_active'] = $request->boolean('is_active', true);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            Product::create($validated);

            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'There was an error creating the product. Please try again.');
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'unit' => 'required|string|in:kg,g,lb,oz',
            'category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        // Set boolean fields
        $validated['is_featured'] = $request->boolean('is_featured', false);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product image from storage if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete the product
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
