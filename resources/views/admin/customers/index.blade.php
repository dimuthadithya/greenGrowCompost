@extends('admin.layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Customers</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Orders</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->orders_count }}</td>
                <td>{{ $customer->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye"></i> View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No customers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $customers->links() }}
</div>
@endsection