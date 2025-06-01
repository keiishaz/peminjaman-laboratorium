@extends('layouts.app')
@section('title', 'Edit Alat')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Edit Alat</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi</label>
            <textarea class="form-control" name="spesifikasi" rows="3" required>{{ $barang->spesifikasi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ $barang->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select" name="kondisi" required>
                <option value="Baik" {{ $barang->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ $barang->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
