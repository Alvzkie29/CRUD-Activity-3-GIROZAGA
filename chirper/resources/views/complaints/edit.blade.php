@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Edit Complaint</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('complaints.update', $complaint->id) }}" hx-post="{{ route('complaints.update', $complaint->id) }}" hx-target="#main-content">
                        @csrf
                        @method('PUT')

                        <!-- Complaint Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $complaint->title }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $complaint->description }}</textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="Pending" {{ $complaint->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Resolved" {{ $complaint->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="Rejected" {{ $complaint->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Update Complaint</button>
                        <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
