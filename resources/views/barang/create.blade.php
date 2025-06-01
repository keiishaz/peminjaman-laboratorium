@extends('layouts.app')
@section('title', 'Tambah Alat')

@section('content')
    <h1 class="mb-3">Tambah Alat</h1>

<form action="{{ route('peminjaman.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Peminjam</label>
        <input type="text" name="nama_peminjam" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NPM</label>
        <input type="text" name="npm" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Barang</label>
        <select name="barang_id" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Petugas</label>
        <select name="petugas_id" class="form-control" required>
            <option value="">-- Pilih Petugas --</option>
            @foreach ($petugas as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="Dipinjam" selected>Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
            <option value="Terlambat">Terlambat</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
