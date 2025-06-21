@extends('admin.layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Contact Messages</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject }}</td>
                <td>
                    <span class="badge bg-{{ $message->status === 'resolved' ? 'success' : 'warning' }}">
                        {{ ucfirst($message->status) }}
                    </span>
                </td>
                <td>{{ $message->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.contact.show', $message) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No messages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $messages->links() }}
</div>
@endsection