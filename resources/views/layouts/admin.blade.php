<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - E-Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <div>
            <span class="navbar-brand">Admin Panel</span>

            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm ms-2">
                Dashboard
            </a>

            <a href="{{ route('admin.candidates.index') }}" class="btn btn-outline-light btn-sm ms-2">
                Manage Candidates
            </a>
        </div>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">
                    Log Out
                </button>
            </form>

    </div>
</nav>

<div class="container mt-4">
    @include('partials.alerts')
    @yield('content')
</div>

    @yield('scripts')
    
</body>
</html>