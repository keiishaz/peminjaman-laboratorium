@extends('layouts.app')
@section('title', 'Tambah Alat')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Tambah Alat</h2>

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" required>
        </div>

        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi</label>
            <textarea class="form-control" name="spesifikasi" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select" name="kondisi" required>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
