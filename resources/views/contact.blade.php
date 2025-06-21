@extends('layouts.app')

@section('title', 'Contact Us - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Contact Us</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="mb-4">Get in Touch</h3>
            <p class="mb-4">Have questions about our products? We're here to help!</p>
            <div class="mb-4">
                <h5><i class="fas fa-map-marker-alt me-2"></i>Address</h5>
                <p class="text-muted">123 Green Street<br>Eco City, EC 12345</p>
            </div>
            <div class="mb-4">
                <h5><i class="fas fa-phone me-2"></i>Phone</h5>
                <p class="text-muted">(555) 123-4567</p>
            </div>
            <div class="mb-4">
                <h5><i class="fas fa-envelope me-2"></i>Email</h5>
                <p class="text-muted">info@greengrow.com</p>
            </div>
        </div>
    </div>
</div>
@endsection