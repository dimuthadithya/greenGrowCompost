@extends('layouts.app')
@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')
<!-- Order Details Section -->
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
                <li class="breadcrumb-item active">Order #ORD-2025-001</li>
            </ol>
        </nav>

        <!-- Order Status -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">Order #ORD-2025-001</h4>
                        <p class="text-muted mb-0">Placed on June 15, 2025</p>
                    </div>
                    <span class="badge bg-success px-3 py-2">Delivered</span>
                </div>

                <!-- Progress Tracker -->
                <div class="order-progress mb-4">
                    <div class="progress" style="height: 4px">
                        <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: 100%"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="text-center">
                            <div class="progress-step completed">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="small mt-2">Order Placed</p>
                        </div>
                        <div class="text-center">
                            <div class="progress-step completed">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="small mt-2">Confirmed</p>
                        </div>
                        <div class="text-center">
                            <div class="progress-step completed">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="small mt-2">Shipped</p>
                        </div>
                        <div class="text-center">
                            <div class="progress-step completed">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="small mt-2">Delivered</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-success mb-3">Delivery Address</h5>
                        <address class="mb-0">
                            <strong>John Doe</strong><br />
                            123 Green Street<br />
                            Colombo 05<br />
                            Western Province<br />
                            Sri Lanka<br />
                            <strong>Phone:</strong> +94 77 123 4567
                        </address>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-success mb-3">Order Summary</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="text-muted">Order Date:</span>
                                <strong class="float-end">June 15, 2025</strong>
                            </li>
                            <li class="mb-2">
                                <span class="text-muted">Payment Method:</span>
                                <strong class="float-end">Cash on Delivery</strong>
                            </li>
                            <li class="mb-2">
                                <span class="text-muted">Delivery Method:</span>
                                <strong class="float-end">Standard Delivery</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Order Items</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 100px">Product</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img
                                        src="https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                                        alt="Premium Garden Compost"
                                        class="img-fluid rounded"
                                        style="width: 80px; height: 80px; object-fit: cover" />
                                </td>
                                <td>
                                    <h6 class="mb-0">Premium Garden Compost</h6>
                                    <small class="text-muted">#PRD001</small>
                                </td>
                                <td>25kg</td>
                                <td>Rs. 1,200</td>
                                <td>2</td>
                                <td class="text-end">Rs. 2,400</td>
                            </tr>
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="5" class="text-end">
                                    <strong>Subtotal:</strong>
                                </td>
                                <td class="text-end">Rs. 2,400</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <strong>Delivery Fee:</strong>
                                </td>
                                <td class="text-end">Rs. 0</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <strong>Total:</strong>
                                </td>
                                <td class="text-end"><strong>Rs. 2,400</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-3 justify-content-end">
            <a href="profile.html#orders" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i>Back to Orders
            </a>
            <a href="track-order.html" class="btn btn-success">
                <i class="fas fa-truck me-2"></i>Track Order
            </a>
            <a href="invoice.html" class="btn btn-success">
                <i class="fas fa-download me-2"></i>Download Invoice
            </a>
        </div>
    </div>
</section>
@endsection