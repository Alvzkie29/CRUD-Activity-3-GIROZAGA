@if(!request()->headers->has('HX-Request'))
    @extends('layouts.app')
@endif

@section('content')
<div class="container mt-4" id="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Complaint Details</h5>
                </div>
                <div class="card-body">
                    <!-- Complaint Title -->
                    <h6 class="fw-bold">SUBJECT OF THE COMPLAINT:</h6>
                    <h4 class="fw-bold">{{ $complaint->title }}</h4>

                    <!-- Status with Color Coding -->
                    <p class="fw-bold">Status: 
                        <span class="badge 
                            @if($complaint->status === 'Resolved') bg-success 
                            @elseif($complaint->status === 'Pending') bg-warning 
                            @else bg-danger @endif">
                            {{ $complaint->status }}
                        </span>
                    </p>

                    <!-- Description -->
                    <div class="mb-3">
                        <h6 class="fw-bold">Description:</h6>
                        <p>{{ $complaint->description }}</p>
                    </div>

                    <!-- Back Button with HTMX -->
                    <a href="{{ route('complaints.index') }}" 
                       class="btn btn-secondary"
                       hx-get="{{ route('complaints.index') }}"
                       hx-target="#main-content"
                       hx-push-url="true"
                       hx-trigger="click">
                        Back to Complaints
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
