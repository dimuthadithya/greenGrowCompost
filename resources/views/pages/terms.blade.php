@extends('layouts.app')

@section('title', 'Terms of Service - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Terms of Service</h1>

    <div class="mb-5">
        <h2 class="h4 mb-3">Agreement to Terms</h2>
        <p>By accessing and using our website, you agree to be bound by these Terms of Service and all applicable laws and regulations.</p>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Use of Website</h2>
        <p>You agree to:</p>
        <ul>
            <li>Use the website for lawful purposes only</li>
            <li>Not interfere with the website's operation</li>
            <li>Provide accurate information when making purchases</li>
            <li>Maintain the security of your account</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Product Information</h2>
        <p>We strive to provide accurate product information, but:</p>
        <ul>
            <li>Colors may vary due to display settings</li>
            <li>Product availability is subject to change</li>
            <li>Prices may be updated without notice</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Ordering and Payment</h2>
        <p>By placing an order, you agree to:</p>
        <ul>
            <li>Provide current and accurate payment information</li>
            <li>Pay all charges incurred through your account</li>
            <li>Accept our shipping and returns policies</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Intellectual Property</h2>
        <p>All content on this website, including text, images, logos, and designs, is our property and protected by copyright laws.</p>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Limitation of Liability</h2>
        <p>We are not liable for any damages arising from:</p>
        <ul>
            <li>Use or inability to use our website</li>
            <li>Product performance or misuse</li>
            <li>Third-party services</li>
        </ul>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        These terms of service were last updated on {{ date('F d, Y') }}.
    </div>
</div>
@endsection