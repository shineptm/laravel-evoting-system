<!DOCTYPE html>
<html>
<head>
    <title>E-Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('layouts.navigation')

<div class="container mt-4">
    @include('partials.alerts')
    @yield('content')
</div>

</body>
</html>