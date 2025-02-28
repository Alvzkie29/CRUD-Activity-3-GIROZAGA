<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Complaints Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-primary px-3">
        <a class="navbar-brand text-white fw-bold" href="#">Complaint System</a>
        <div>
            @auth
                <a href="{{ route('complaints.index') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section (Compact) -->
    <div class="text-center p-4">
        <h3 class="fw-bold">Welcome to Complaint System</h3>
        <p class="text-muted small">Track and manage complaints efficiently.</p>
        <a href="{{ route('complaints.index') }}" class="btn btn-primary btn-sm">View Complaints</a>
    </div>

    <!-- Extra Content to Fill the Page -->
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card shadow-sm text-center p-3">
                    <h5 class="fw-bold">Easy to Use</h5>
                    <p class="text-muted small">Submit and track complaints with just a few clicks.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center p-3">
                    <h5 class="fw-bold">Real-time Status</h5>
                    <p class="text-muted small">Get updates on your complaints instantly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center p-3">
                    <h5 class="fw-bold">Fast Customer Service</h5>
                    <p class="text-muted small">Your complaints are handled with care and effort.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
