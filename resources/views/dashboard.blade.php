@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    <!-- Profil -->
    <div class="d-flex align-items-center justify-content-between mb-4 p-3 rounded shadow-sm bg-white">
        <div>
            <h4 class="mb-0">Halo, {{ $user->nama_lengkap ?? $user->name }}!</h4>
            <small class="text-muted">{{ $user->email }}</small> <br>
            <small class="text-muted">{{ $user->nomor_telepon }}</small>
        </div>
    </div>

    <!-- Kartu Statistik -->
    <div class="row g-3 mb-4">
        @php $cardHeight = 180; @endphp

        <div class="col-md-4 d-flex">
            <div class="card text-center shadow-sm flex-fill" style="height: {{ $cardHeight }}px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-hdd-stack fs-1 text-primary mb-3"></i>
                    <h5>Total Alat</h5>
                    <h2>{{ $totalBarangs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card text-center shadow-sm flex-fill" style="height: {{ $cardHeight }}px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-box-arrow-in-right fs-1 text-success mb-3"></i>
                    <h5>Peminjaman Aktif</h5>
                    <h2>{{ $totalPeminjamanAktif }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card text-center shadow-sm flex-fill" style="height: {{ $cardHeight }}px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-tools fs-1 text-warning mb-3"></i>
                    <h5>Perbaikan Berjalan</h5>
                    <h2>{{ $totalPerbaikanBerjalan }}</h2>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush
