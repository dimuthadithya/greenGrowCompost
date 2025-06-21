@extends('layouts.app')

@section('title', 'Refund Policy - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Refund Policy</h1>

    <div class="mb-5">
        <h2 class="h4 mb-3">Refund Eligibility</h2>
        <p>Refunds are available for:</p>
        <ul>
            <li>Unopened products returned within 30 days</li>
            <li>Defective products</li>
            <li>Incorrect items received</li>
            <li>Damaged products (reported within 48 hours of delivery)</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Refund Process</h2>
        <ol>
            <li>Contact customer service to initiate a refund</li>
            <li>Receive return authorization</li>
            <li>Return the product (if required)</li>
            <li>Refund processed after inspection</li>
            <li>Refund sent to original payment method</li>
        </ol>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Refund Timeline</h2>
        <p>Once we receive and inspect the return:</p>
        <ul>
            <li>Processing time: 3-5 business days</li>
            <li>Credit card refunds: 5-10 business days</li>
            <li>Bank transfers: 5-7 business days</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Non-Refundable Items</h2>
        <p>The following are not eligible for refunds:</p>
        <ul>
            <li>Opened or used products</li>
            <li>Custom orders</li>
            <li>Clearance items</li>
            <li>Gift cards</li>
        </ul>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        For questions about refunds, please contact our customer service team.
    </div>
</div>
@endsection