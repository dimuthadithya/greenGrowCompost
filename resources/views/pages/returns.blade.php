@extends('layouts.app')

@section('title', 'Returns Policy - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Returns Policy</h1>

    <div class="mb-5">
        <h2 class="h4 mb-3">Return Period</h2>
        <p>We accept returns within 30 days of purchase for unopened products. The product must be in its original packaging and condition.</p>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Return Process</h2>
        <ol>
            <li>Contact our customer service team to initiate a return</li>
            <li>Receive a return authorization number</li>
            <li>Package the item securely with all original packaging</li>
            <li>Include the return authorization number on the package</li>
            <li>Ship the item back using a trackable shipping method</li>
        </ol>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Non-Returnable Items</h2>
        <p>The following items cannot be returned:</p>
        <ul>
            <li>Opened or used products</li>
            <li>Custom or personalized orders</li>
            <li>Items damaged due to improper storage or handling</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Return Shipping</h2>
        <p>Customers are responsible for return shipping costs unless the return is due to our error (wrong item shipped, defective product, etc.).</p>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        For any questions about returns, please contact our customer service team.
    </div>
</div>
@endsection