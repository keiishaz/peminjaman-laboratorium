@extends('layouts.app')
@section('title', 'Data Peminjaman')

@section('content')
    <h1 class="mb-3">Data Peminjaman</h1>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NPM</th>
            <th>Barang</th>
            <th>Petugas</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjamans as $p)
            <tr>
                <td>{{ $p->nama_peminjam }}</td>
                <td>{{ $p->npm }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->petugas->nama_lengkap }}</td>
                <td>{{ $p->tanggal_pinjam }}</td>
                <td>{{ $p->tanggal_kembali }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('peminjaman.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
