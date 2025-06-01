<nav class="sidebar bg-fresh text-dark d-flex flex-column p-3 shadow-sm">
    <div class="sidebar-brand mb-4 d-flex align-items-center">
        <!-- Gambar Logo UNIB -->
        <img src="{{ asset('images/unib.png') }}" alt="Logo UNIB" width="35" class="me-2">
        
        <!-- Teks nama sistem -->
        <span class="fw-bold fs-6 text-primary">
            Peminjaman Alat Laboratorium
        </span>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                <i class="bi bi-tools me-2"></i> Daftar Alat
            </a>
        </li>
        <li>
            <a href="{{ route('peminjaman') }}" class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check me-2"></i> Peminjaman
            </a>
        </li>
        <li>
            <a href="{{ route('perbaikan.index') }}" class="nav-link {{ request()->routeIs('perbaikan.*') ? 'active' : '' }}">
                <i class="bi bi-wrench me-2"></i> Perbaikan
            </a>
        </li>

        <li class="mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
