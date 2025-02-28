@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Wrapper -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Create a New Complaint</h5>
                </div>
                <div class="card-body">
                    <!-- Success/Error Alerts -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <!-- Complaint Form -->
                    <form action="{{ route('complaints.store') }}" method="POST">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Complaint Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Complaint Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe your complaint" required></textarea>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Complaint Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Pending" selected>Pending</option>
                                <option value="Resolved">Resolved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                        <!-- Submit & Cancel Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
