@extends('layouts.app')
@section('title', 'Data Alat')

@section('content')
    <h1 class="mb-3">Data Alat</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Alat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Gambar</th>
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
                        @if($barang->gambar)
                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="gambar" width="70">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
