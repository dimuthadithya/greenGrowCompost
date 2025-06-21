@extends('admin.layouts.admin')

@section('title', 'Message Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Message Details</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Messages
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Message Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6>From:</h6>
                    <p>{{ $message->name }} ({{ $message->email }})</p>
                </div>
                <div class="mb-3">
                    <h6>Subject:</h6>
                    <p>{{ $message->subject }}</p>
                </div>
                <div class="mb-3">
                    <h6>Message:</h6>
                    <p class="white-space-pre-wrap">{{ $message->message }}</p>
                </div>
                <div class="mb-3">
                    <h6>Date:</h6>
                    <p>{{ $message->created_at->format('M d, Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                        <i class="fas fa-reply me-1"></i> Reply via Email
                    </a>
                    <form action="{{ route('admin.contact.destroy', $message) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this message?')">
                            <i class="fas fa-trash me-1"></i> Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .white-space-pre-wrap {
        white-space: pre-wrap;
    }
</style>
@endpush