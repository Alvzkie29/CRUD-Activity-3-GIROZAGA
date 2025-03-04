@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Create New Complaint</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('complaints.store') }}" 
                        hx-post="{{ route('complaints.store') }}" 
                        hx-target="#main-content" 
                        hx-swap="outerHTML"
                        hx-push-url="true">
                        @csrf

                        <!-- Complaint Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="Pending" selected>Pending</option>
                                <option value="Resolved">Resolved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
