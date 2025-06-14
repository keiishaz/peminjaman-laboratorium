@extends('layouts.app')
@section('title', 'Tambah Peminjaman')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Tambah Peminjaman</h2>

    <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Alat</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Alat --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="petugas_id" class="form-label">Pilih Petugas</label>
            <select name="petugas_id" id="petugas_id" class="form-select" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap ?? $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" name="npm" id="npm" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
        <a href="{{ route('peminjaman') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
