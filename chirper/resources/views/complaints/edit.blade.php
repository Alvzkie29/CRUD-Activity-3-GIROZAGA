@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Complaint</h5>
                </div>
                <div class="card-body">
                    <!-- Form to Update Complaint -->
                    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Complaint Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $complaint->title }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Complaint Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $complaint->description }}</textarea>
                        </div>

                        <!-- Status Dropdown with Colors -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Complaint Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Pending" @if($complaint->status == 'Pending') selected @endif>Pending</option>
                                <option value="Resolved" @if($complaint->status == 'Resolved') selected @endif>Resolved</option>
                                <option value="Rejected" @if($complaint->status == 'Rejected') selected @endif>Rejected</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
