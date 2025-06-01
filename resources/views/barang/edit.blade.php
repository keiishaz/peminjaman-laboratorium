@extends('layouts.app')
@section('title', 'Edit Alat')

@section('content')
    <h1 class="mb-3">Edit Alat</h1>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="mb-3">
            <label>Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control">{{ $barang->spesifikasi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control" required>
                <option value="Baik" {{ $barang->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ $barang->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="Habis" {{ $barang->kondisi == 'Habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if($barang->gambar)
                <p class="mt-2">Gambar lama: <img src="{{ asset('storage/' . $barang->gambar) }}" width="70"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
