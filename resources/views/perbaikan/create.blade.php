@extends('layouts.app')
@section('title', 'Tambah Perbaikan')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Tambah Perbaikan</h2>

    <form action="{{ route('perbaikan.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="petugas_id" class="form-label">Pilih Petugas</label>
            <select name="petugas_id" id="petugas_id" class="form-select" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap ?? $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lapor" class="form-label">Tanggal Lapor</label>
            <input type="date" name="tanggal_lapor" id="tanggal_lapor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kerusakan" class="form-label">Kerusakan</label>
            <textarea name="kerusakan" id="kerusakan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="Dilaporkan">Dilaporkan</option>
                <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <textarea name="tindakan" id="tindakan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perbaikan</button>
        <a href="{{ route('perbaikan.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
