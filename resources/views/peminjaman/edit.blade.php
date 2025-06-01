@extends('layouts.app')
@section('title', 'Edit Data Peminjaman')

@section('content')
<div class="container">
    <h4>Edit Data Peminjaman</h4>

    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}" required>
        </div>

        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" value="{{ old('npm', $peminjaman->npm) }}" required>
        </div>

        <div class="mb-3">
            <label>Barang</label>
            <select name="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ (old('barang_id', $peminjaman->barang_id) == $barang->id) ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ (old('petugas_id', $peminjaman->petugas_id) == $p->id) ? 'selected' : '' }}>
                        {{ $p->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Dikembalikan</label>
            <input type="date" name="tanggal_dikembalikan" class="form-control" value="{{ old('tanggal_dikembalikan', $peminjaman->tanggal_dikembalikan) }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Dipinjam" {{ (old('status', $peminjaman->status) == 'Dipinjam') ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ (old('status', $peminjaman->status) == 'Dikembalikan') ? 'selected' : '' }}>Dikembalikan</option>
                <option value="Terlambat" {{ (old('status', $peminjaman->status) == 'Terlambat') ? 'selected' : '' }}>Terlambat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control">{{ old('catatan', $peminjaman->catatan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('peminjaman') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
