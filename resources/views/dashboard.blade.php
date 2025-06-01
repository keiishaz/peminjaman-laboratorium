@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Profil Akun -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Profil Akun</div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $user->nama_lengkap ?? $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'Petugas') }}</p>
                    <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm">Edit Profil</a>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="col-md-8 mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Alat</h5>
                            <p class="display-6">{{ $totalBarangs }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Peminjaman Aktif</h5>
                            <p class="display-6">{{ $totalPeminjamanAktif }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Perbaikan Berjalan</h5>
                            <p class="display-6">{{ $totalPerbaikanBerjalan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Statistik Peminjaman Bulanan</div>
                <div class="card-body">
                    <canvas id="peminjamanChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('peminjamanChart').getContext('2d');
        const peminjamanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($bulan) !!},
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: {!! json_encode($dataPeminjaman) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
