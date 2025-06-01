@extends('layouts.app')
@section('title', 'Data Perbaikan')

@section('content')
    <h1 class="mb-3">Data Perbaikan</h1>
    <a href="{{ route('perbaikan.create') }}" class="btn btn-primary mb-3">Tambah Perbaikan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Barang</th>
            <th>Petugas</th>
            <th>Tanggal Lapor</th>
            <th>Kerusakan</th>
            <th>Status</th>
            <th>Tindakan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perbaikans as $p)
            <tr>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->petugas->nama_lengkap }}</td>
                <td>{{ $p->tanggal_lapor }}</td>
                <td>{{ $p->kerusakan }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->tindakan ?? '-' }}</td>
                <td>
                    <a href="{{ route('perbaikan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('perbaikan.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
