<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Peminjaman Alat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('barang.index') ? 'active' : '' }}" href="{{ route('barang.index') }}">Daftar Alat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('peminjaman.index') ? 'active' : '' }}" href="{{ route('peminjaman') }}">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('perbaikan.index') ? 'active' : '' }}" href="{{ route('perbaikan.index') }}">Perbaikan</a>
                </li>
            </ul>

            <!-- Tambahkan logout form di kanan -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="display:inline; padding:0; border:none; background:none;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
