<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Peminjaman Alat')</title>
    <!-- Bootstrap CSS (gunakan CDN atau download lokal) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <style>
        /* Custom minimalis styling contoh */
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .nav-link.active {
            font-weight: 600;
            color: #0d6efd !important; /* Bootstrap primary */
        }
        .content {
            padding: 20px;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <main class="container content">
        @yield('content')
    </main>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
