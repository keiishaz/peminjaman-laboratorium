@extends('layouts.app')

@section('content')
<!-- Clean Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-unib py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <div class="unib-logo me-2">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="30" height="30" rx="6" fill="white"/>
                    <path d="M15 5L20 10V20L15 25L10 20V10L15 5Z" fill="#006633"/>
                    <circle cx="15" cy="15" r="5" fill="#FFCC00"/>
                </svg>
            </div>
            <span class="fw-bold">SIPALAB</span>
        </a>
        <div class="ms-auto d-flex">
            <a href="" class="btn btn-sm btn-light me-2">Masuk</a>
            <a href="" class="btn btn-sm btn-outline-light">Daftar</a>
        </div>
    </div>
</nav>

<!-- Minimal Hero Section -->
<section class="hero-section py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-3">Sistem Peminjaman Alat Lab</h1>
                <p class="lead mb-4">Prodi Sistem Informasi<br>Universitas Bengkulu</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{}" class="btn btn-primary btn-lg px-4">Akses Sistem →</a>
                    <a href="#features" class="btn btn-outline-secondary btn-lg px-4">Pelajari Fitur</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Cards - Text Only -->
<section id="features" class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon mb-3">
                        <div class="icon-circle bg-primary text-white">1</div>
                    </div>
                    <h4 class="fw-bold">Peminjaman Online</h4>
                    <p class="mb-0">Ajukan peminjaman alat kapan saja melalui sistem digital</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon mb-3">
                        <div class="icon-circle bg-success text-white">2</div>
                    </div>
                    <h4 class="fw-bold">Katalog Digital</h4>
                    <p class="mb-0">Temukan alat laboratorium dengan pencarian terstruktur</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon mb-3">
                        <div class="icon-circle bg-warning text-dark">3</div>
                    </div>
                    <h4 class="fw-bold">Manajemen</h4>
                    <p class="mb-0">Pantau riwayat dan status peminjaman alat</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple Footer -->
<footer class="py-4 bg-dark text-white">
    <div class="container text-center">
        <p class="mb-0 small">SIPALAB &copy; 2023 - Prodi Sistem Informasi UNIB</p>
    </div>
</footer>
@endsection