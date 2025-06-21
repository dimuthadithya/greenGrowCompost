<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Product Routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', function () {
        return view('products');
    })->name('index');

    Route::get('/{product}', function ($product) {
        return view('productdetails', ['product' => $product]);
    })->name('show');
});

// Order Routes
Route::get('/track-order', function () {
    return view('trackorder');
})->name('track.order');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/order/{id}', function ($id) {
    return view('orderdeatils', ['order' => $id]);
})->name('order.details');



// Authentication & Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


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

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Products Management
    Route::resource('products', ProductController::class);

    // Orders Management
    Route::resource('orders', OrderController::class);

    // Customers Management
    Route::resource('customers', CustomerController::class);

    // Contact Messages Management
    Route::resource('contact', ContactController::class)->only(['index', 'show', 'destroy']);
});

require __DIR__ . '/auth.php';
