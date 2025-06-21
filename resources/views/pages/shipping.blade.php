@extends('layouts.app')

@section('title', 'Shipping Policy - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Shipping Policy</h1>

    <div class="mb-5">
        <h2 class="h4 mb-3">Shipping Methods</h2>
        <p>We offer the following shipping options:</p>
        <ul>
            <li>Standard Shipping (3-5 business days)</li>
            <li>Express Shipping (1-2 business days)</li>
            <li>Local Pickup (Available at select locations)</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Shipping Costs</h2>
        <p>Shipping costs are calculated based on:</p>
        <ul>
            <li>Order weight</li>
            <li>Delivery location</li>
            <li>Selected shipping method</li>
        </ul>
        <p>Free shipping is available for orders over $75 within the continental United States.</p>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Delivery Times</h2>
        <p>Orders are typically processed within 1-2 business days. Delivery times vary based on the shipping method selected and your location.</p>
        <p>Please note that delivery times may be affected by:</p>
        <ul>
            <li>Weather conditions</li>
            <li>Holiday periods</li>
            <li>Unforeseen circumstances</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Tracking Your Order</h2>
        <p>Once your order ships, you'll receive a confirmation email with tracking information. You can also track your order through our website using your order number.</p>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        For any shipping-related questions, please contact our customer service team.
    </div>
</div>
@endsection