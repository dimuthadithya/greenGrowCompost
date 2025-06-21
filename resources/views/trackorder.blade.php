@extends('layouts.app')
@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')
<!-- Track Order Section -->
<section class="py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="profile.html" class="text-decoration-none">My Profile</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="profile.html#orders" class="text-decoration-none">Orders</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="order-details.html" class="text-decoration-none">Order #ORD-2025-001</a>
                </li>
                <li class="breadcrumb-item active">Track Order</li>
            </ol>
        </nav>

        <!-- Order Info -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="card-title mb-1">Order #ORD-2025-001</h4>
                        <p class="text-muted mb-0">Placed on June 15, 2025</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="badge bg-success px-3 py-2">Out for Delivery</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tracking Timeline -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="card-title mb-4">Tracking Details</h5>
                <div class="tracking-timeline">
                    <!-- Current Status -->
                    <div class="tracking-item active">
                        <div class="tracking-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="tracking-content">
                            <h6 class="mb-1">Out for Delivery</h6>
                            <p class="text-muted mb-0">June 16, 2025 - 09:30 AM</p>
                            <p class="small mb-0">Your order is out for delivery</p>
                        </div>
                    </div>

                    <!-- Previous Status -->
                    <div class="tracking-item completed">
                        <div class="tracking-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="tracking-content">
                            <h6 class="mb-1">Package Dispatched</h6>
                            <p class="text-muted mb-0">June 16, 2025 - 08:00 AM</p>
                            <p class="small mb-0">
                                Order has been picked up by delivery partner
                            </p>
                        </div>
                    </div>

                    <div class="tracking-item completed">
                        <div class="tracking-icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <div class="tracking-content">
                            <h6 class="mb-1">Order Processed</h6>
                            <p class="text-muted mb-0">June 15, 2025 - 04:30 PM</p>
                            <p class="small mb-0">Order has been processed and packed</p>
                        </div>
                    </div>

                    <div class="tracking-item completed">
                        <div class="tracking-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="tracking-content">
                            <h6 class="mb-1">Order Confirmed</h6>
                            <p class="text-muted mb-0">June 15, 2025 - 02:15 PM</p>
                            <p class="small mb-0">Payment verified and order confirmed</p>
                        </div>
                    </div>

                    <div class="tracking-item completed">
                        <div class="tracking-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="tracking-content">
                            <h6 class="mb-1">Order Placed</h6>
                            <p class="text-muted mb-0">June 15, 2025 - 02:00 PM</p>
                            <p class="small mb-0">
                                Order #ORD-2025-001 placed successfully
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivery Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Delivery Details</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-success mb-3">Delivery Address</h6>
                        <address class="mb-4">
                            <strong>John Doe</strong><br />
                            123 Green Street<br />
                            Colombo 05<br />
                            Western Province<br />
                            Sri Lanka<br />
                            <strong>Phone:</strong> +94 77 123 4567
                        </address>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success mb-3">Estimated Delivery</h6>
                        <p class="mb-2"><strong>Date:</strong> June 16, 2025</p>
                        <p class="mb-2">
                            <strong>Time:</strong> Between 10:00 AM - 12:00 PM
                        </p>
                        <p class="mb-0">
                            <strong>Delivery Partner:</strong> Express Delivery Services
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-3 justify-content-end">
            <a href="order-details.html" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i>Back to Order Details
            </a>
            <button
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#supportModal">
                <i class="fas fa-headset me-2"></i>Need Help?
            </button>
        </div>
    </div>
</section>

<!-- Support Modal -->
<div class="modal fade" id="supportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Support</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>If you need assistance with your delivery, please contact us:</p>
                <div class="mb-3">
                    <i class="fas fa-phone text-success me-2"></i>
                    +94 11 234 5678
                </div>
                <div class="mb-3">
                    <i class="fas fa-envelope text-success me-2"></i>
                    support@greengrow.lk
                </div>
                <div>
                    <i class="fas fa-clock text-success me-2"></i>
                    Available 24/7
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <a href="index.html#contact" class="btn btn-success">Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection