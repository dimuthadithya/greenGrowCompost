@extends('layouts.app')
@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')
<!-- Profile Section -->
<section class="py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item active">My Profile</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="profile-image mb-3">
                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=198754&color=fff"
                                alt="{{ Auth::user()->name }}"
                                class="rounded-circle" />
                        </div>
                        <h5 class="card-title mb-1">{{ Auth::user()->name }}</h5>
                        <p class="text-muted small mb-3">Member since {{ Auth::user()->created_at->format('F Y') }}</p>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-1"></i>Edit Profile
                        </button>
                    </div>
                    <div class="list-group list-group-flush">
                        <a
                            href="#profile"
                            class="list-group-item list-group-item-action active"
                            data-bs-toggle="list">
                            <i class="fas fa-user me-2"></i>Profile Overview
                        </a>
                        <a
                            href="#orders"
                            class="list-group-item list-group-item-action"
                            data-bs-toggle="list">
                            <i class="fas fa-shopping-bag me-2"></i>My Orders
                        </a>
                        <a
                            href="#addresses"
                            class="list-group-item list-group-item-action"
                            data-bs-toggle="list">
                            <i class="fas fa-map-marker-alt me-2"></i>My Addresses
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- Profile Overview -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Personal Information</h4>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Full Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="{{ Auth::user()->name }}"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                value="{{ Auth::user()->email }}"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Phone</label>
                                            <input
                                                type="tel"
                                                class="form-control"
                                                value="+94 77 123 4567"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Location</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="Colombo, Sri Lanka"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div
                                    class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Recent Orders</h4>
                                    <a
                                        href="#orders"
                                        class="btn btn-link text-success"
                                        data-bs-toggle="list">View All</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentOrders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->created_at->format('F d, Y') }}</td>
                                                <td>
                                                    @php
                                                    $statusClass = match($order->status) {
                                                    'delivered' => 'bg-success',
                                                    'shipped' => 'bg-info',
                                                    'processing' => 'bg-warning',
                                                    'cancelled' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                    };
                                                    @endphp
                                                    <span class="badge {{ $statusClass }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td>Rs. {{ number_format($order->total_amount, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-outline-success">View</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No orders found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics -->
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="text-success mb-3">
                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                        </div>
                                        <h5 class="card-title">Total Orders</h5>
                                        <p class="h3 text-success mb-0">{{ $stats['totalOrders'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="text-success mb-3">
                                            <i class="fas fa-leaf fa-2x"></i>
                                        </div>
                                        <h5 class="card-title">Products Bought</h5>
                                        <p class="h3 text-success mb-0">{{ $stats['totalProducts'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="text-success mb-3">
                                            <i class="fas fa-star fa-2x"></i>
                                        </div>
                                        <h5 class="card-title">Reviews Given</h5>
                                        <p class="h3 text-success mb-0">{{ $stats['totalReviews'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Order History</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Products</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentOrders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->created_at->format('F d, Y') }}</td>
                                                <td>
                                                    @foreach($order->items as $item)
                                                    {{ $item->product->name }} ({{ $item->quantity }})
                                                    @if(!$loop->last), @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @php
                                                    $statusClass = match($order->status) {
                                                    'delivered' => 'bg-success',
                                                    'shipped' => 'bg-info',
                                                    'processing' => 'bg-warning',
                                                    'cancelled' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                    };
                                                    @endphp
                                                    <span class="badge {{ $statusClass }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td>Rs. {{ number_format($order->total_amount, 2) }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('order.details', $order->id) }}" class="btn btn-outline-success">
                                                            View
                                                        </a>
                                                        @if($order->status === 'shipped')
                                                        <button class="btn btn-outline-success" onclick="window.location.href='{{ route('track.order') }}?order={{ $order->order_number }}'">
                                                            Track
                                                        </button>
                                                        @endif
                                                        @if(in_array($order->status, ['delivered', 'shipped']))
                                                        <a href="#" class="btn btn-outline-success">
                                                            Invoice
                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No orders found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div class="tab-pane fade" id="addresses">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div
                                    class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">My Addresses</h4>
                                    <button
                                        class="btn btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addAddressModal">
                                        <i class="fas fa-plus me-1"></i>Add New Address
                                    </button>
                                </div>
                                <div class="row g-4">
                                    <!-- Default Address -->
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <h5 class="card-title">Home</h5>
                                                    <span class="badge bg-success">Default</span>
                                                </div>
                                                <address class="mb-4">
                                                    123 Green Street<br />
                                                    Colombo 05<br />
                                                    Western Province<br />
                                                    Sri Lanka<br />
                                                    <strong>Phone:</strong> +94 77 123 4567
                                                </address>
                                                <div class="btn-group btn-group-sm">
                                                    <button
                                                        class="btn btn-outline-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editAddressModal"
                                                        data-bs-label="Home"
                                                        data-bs-street="123 Green Street"
                                                        data-bs-city="Colombo 05"
                                                        data-bs-province="Western Province"
                                                        data-bs-country="Sri Lanka"
                                                        data-bs-phone="+94 77 123 4567">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Work Address -->
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2">Work</h5>
                                                <address class="mb-4">
                                                    456 Office Complex<br />
                                                    Rajagiriya<br />
                                                    Western Province<br />
                                                    Sri Lanka<br />
                                                    <strong>Phone:</strong> +94 77 987 6543
                                                </address>
                                                <div class="btn-group btn-group-sm">
                                                    <button
                                                        class="btn btn-outline-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editAddressModal"
                                                        data-bs-label="Work"
                                                        data-bs-street="456 Office Complex"
                                                        data-bs-city="Rajagiriya"
                                                        data-bs-province="Western Province"
                                                        data-bs-country="Sri Lanka"
                                                        data-bs-phone="+94 77 987 6543">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-outline-danger">
                                                        Delete
                                                    </button>
                                                    <button class="btn btn-outline-success">
                                                        Set as Default
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add New Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Address</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Address Label</label>
                    <select class="form-select">
                        <option value="">Select a label</option>
                        <option value="home">Home</option>
                        <option value="work">Work</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Street Address</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your street address" />
                </div>
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your city" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Province</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your province" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your country" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input
                        type="tel"
                        class="form-control"
                        placeholder="Enter your phone number" />
                </div>
                <div class="form-check mb-3">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="setAsDefault" />
                    <label class="form-check-label" for="setAsDefault">Set as default address</label>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancel
                </button>
                <button
                    type="button"
                    class="btn btn-success"
                    data-bs-dismiss="modal">
                    Add Address
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Address</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Address Label</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Street Address</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Province</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancel
                </button>
                <button
                    type="button"
                    class="btn btn-success"
                    data-bs-dismiss="modal">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required />
                        @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required />
                        @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p class="mb-3">Are you sure you want to delete your account? This action cannot be undone.</p>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Enter your password to confirm" />
                        @error('password', 'userDeletion')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('status') === 'profile-updated')
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-success">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            Profile updated successfully!
        </div>
    </div>
</div>
@endif
@endsection