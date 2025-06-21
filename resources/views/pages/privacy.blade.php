@extends('layouts.app')

@section('title', 'Privacy Policy - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Privacy Policy</h1>

    <div class="mb-5">
        <h2 class="h4 mb-3">Information We Collect</h2>
        <p>We collect the following types of information:</p>
        <ul>
            <li>Personal information (name, email, address)</li>
            <li>Payment information</li>
            <li>Order history</li>
            <li>Website usage data</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">How We Use Your Information</h2>
        <p>We use your information to:</p>
        <ul>
            <li>Process and fulfill your orders</li>
            <li>Communicate about your orders</li>
            <li>Send marketing communications (with your consent)</li>
            <li>Improve our products and services</li>
            <li>Comply with legal obligations</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Information Sharing</h2>
        <p>We do not sell your personal information. We share your information only with:</p>
        <ul>
            <li>Shipping partners to deliver your orders</li>
            <li>Payment processors to handle transactions</li>
            <li>Service providers who assist our operations</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Your Rights</h2>
        <p>You have the right to:</p>
        <ul>
            <li>Access your personal information</li>
            <li>Correct inaccurate information</li>
            <li>Request deletion of your information</li>
            <li>Opt-out of marketing communications</li>
        </ul>
    </div>

    <div class="mb-5">
        <h2 class="h4 mb-3">Contact Us</h2>
        <p>If you have questions about our privacy policy, please contact us at:</p>
        <p>Email: privacy@greengrow.com<br>
            Phone: (555) 123-4567</p>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        This privacy policy was last updated on {{ date('F d, Y') }}.
    </div>
</div>
@endsection