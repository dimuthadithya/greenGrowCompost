<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductReviewController;

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [ProductController::class, 'home'])->name('home');

// Public Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Product Routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

// Order Routes
Route::get('/track-order', function () {
    return view('trackorder');
})->name('track.order');

// Cart Routes
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{product}', 'add')->name('cart.add');
    Route::delete('/cart/remove/{product}', 'remove')->name('cart.remove');
    Route::patch('/cart/update/{product}', 'update')->name('cart.update');
    Route::delete('/cart/clear', 'clear')->name('cart.clear');
});

// Checkout Routes
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/checkout', 'process')->name('checkout.process');
});

Route::get('/order/{id}', function ($id) {
    $order = \App\Models\Order::with(['items.product', 'address'])->findOrFail($id);
    return view('orderdetails', ['order' => $order]);
})->name('order.details');



// Authentication & Profile Routes

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Address Routes
Route::middleware('auth')->group(function () {
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::patch('/addresses/{address}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');
    Route::patch('/addresses/{address}/default', [AddressController::class, 'setDefault'])->name('addresses.default');
});

// Product Review Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/{order}/reviews', [ProductReviewController::class, 'create'])->name('reviews.create');
    Route::post('/orders/{order}/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Products Management
    Route::resource('products', AdminProductController::class);

    // Orders Management
    Route::resource('orders', OrderController::class);

    // Customers Management
    Route::resource('customers', CustomerController::class);

    // Contact Messages Management
    Route::resource('contact', ContactController::class)->only(['index', 'show', 'destroy']);

    // Reviews Management
    Route::get('reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::post('reviews/{review}/toggle', [\App\Http\Controllers\Admin\ReviewController::class, 'toggleApproval'])->name('reviews.toggle');
    Route::delete('reviews/{review}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
});


// Order Confirmation Route
Route::get('/order/confirmation/{order}', function ($order) {
    return view('order.confirmation', compact('order'));
})->name('order.confirmation');

require __DIR__ . '/auth.php';
