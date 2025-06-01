@extends('layouts.app')
@section('title', 'Data Alat')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Data Alat</h2>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Alat</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <input type="text" id="searchInput" placeholder="Cari nama, spesifikasi, stok, atau kondisi..." class="form-control mb-3" />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->spesifikasi }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->kondisi }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const nama = row.cells[0].textContent.toLowerCase();
            const spesifikasi = row.cells[1].textContent.toLowerCase();
            const stok = row.cells[2].textContent.toLowerCase();
            const kondisi = row.cells[3].textContent.toLowerCase();

            if (
                nama.includes(keyword) ||
                spesifikasi.includes(keyword) ||
                stok.includes(keyword) ||
                kondisi.includes(keyword)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
