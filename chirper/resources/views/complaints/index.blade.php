@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">List of Complaints</h2>
        <a href="{{ route('complaints.create') }}" class="btn btn-primary">Create Complaint</a>
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
            <tbody>
                @foreach ($complaints as $complaint)
                    <tr>
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
                            <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
