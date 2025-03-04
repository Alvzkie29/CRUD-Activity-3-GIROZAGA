@extends('layouts.app')

@section('content')
<div class="container mt-4" id="main-content"> <!-- Add an ID for HTMX targeting -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">List of Complaints</h2>
        <a href="{{ route('complaints.create') }}" 
           class="btn btn-primary"
           hx-get="{{ route('complaints.create') }}"
           hx-target="#main-content"
           hx-push-url="true"
           hx-trigger="click">
            Create Complaint
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="complaint-list">
                @foreach ($complaints as $complaint)
                    <tr id="complaint-{{ $complaint->id }}">
                        <td>{{ $complaint->id }}</td>
                        <td>{{ $complaint->title }}</td>
                        <td>
                            <span class="badge 
                                @if($complaint->status == 'Resolved') bg-success 
                                @elseif($complaint->status == 'Pending') bg-warning 
                                @elseif($complaint->status == 'Rejected') bg-danger 
                                @endif">
                                {{ $complaint->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('complaints.show', $complaint->id) }}" 
                               class="btn btn-primary btn-sm"
                               hx-get="{{ route('complaints.show', $complaint->id) }}"
                               hx-target="#main-content"
                               hx-push-url="true"
                               hx-trigger="click">
                                View
                            </a>
                            <a href="{{ route('complaints.edit', $complaint->id) }}" 
                               class="btn btn-warning btn-sm"
                               hx-get="{{ route('complaints.edit', $complaint->id) }}"
                               hx-target="#main-content"
                               hx-push-url="true"
                               hx-trigger="click">
                                Edit
                            </a>
                            <form action="{{ route('complaints.destroy', $complaint->id) }}" 
                                  method="POST" class="d-inline"
                                  hx-delete="{{ route('complaints.destroy', $complaint->id) }}"
                                  hx-target="#complaint-{{ $complaint->id }}"
                                  hx-swap="outerHTML"
                                  hx-confirm="Are you sure you want to delete this complaint?">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
