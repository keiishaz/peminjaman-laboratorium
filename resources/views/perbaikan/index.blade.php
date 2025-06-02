@extends('layouts.app')
@section('title', 'Data Perbaikan')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Data Perbaikan</h2>
        <a href="{{ route('perbaikan.create') }}" class="btn btn-primary">+ Tambah Perbaikan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <input type="text" id="searchInput" placeholder="Cari alat, petugas, kerusakan, status, tindakan..." class="form-control mb-3" />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alat</th>
                <th>Petugas</th>
                <th>Tanggal Lapor</th>
                <th>Kerusakan</th>
                <th>Status</th>
                <th>Tindakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($perbaikans as $p)
                <tr>
                    <td>{{ $p->barang->nama_barang }}</td>
                    <td>{{ $p->petugas->nama_lengkap }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_lapor)->format('d-m-Y') }}</td>
                    <td>{{ $p->kerusakan }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->tindakan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('perbaikan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('perbaikan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Data perbaikan belum ada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const alat = row.cells[0].textContent.toLowerCase();
            const petugas = row.cells[1].textContent.toLowerCase();
            const kerusakan = row.cells[3].textContent.toLowerCase();
            const status = row.cells[4].textContent.toLowerCase();
            const tindakan = row.cells[5].textContent.toLowerCase();

            if (
                alat.includes(keyword) ||
                petugas.includes(keyword) ||
                kerusakan.includes(keyword) ||
                status.includes(keyword) ||
                tindakan.includes(keyword)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
