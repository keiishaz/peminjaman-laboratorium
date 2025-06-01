@extends('layouts.app')
@section('title', 'Edit Data Peminjaman')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Edit Peminjaman</h2>

    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}" required>
        </div>

        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $peminjaman->npm) }}" required>
        </div>

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ (old('barang_id', $peminjaman->barang_id) == $barang->id) ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $peminjaman->jumlah) }}" required>
        </div>

        <div class="mb-3">
            <label for="petugas_id" class="form-label">Petugas</label>
            <select name="petugas_id" id="petugas_id" class="form-select" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ (old('petugas_id', $peminjaman->petugas_id) == $p->id) ? 'selected' : '' }}>
                        {{ $p->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
            <input type="date" class="form-control" name="tanggal_dikembalikan" id="tanggal_dikembalikan" value="{{ old('tanggal_dikembalikan', $peminjaman->tanggal_dikembalikan) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Dipinjam" {{ (old('status', $peminjaman->status) == 'Dipinjam') ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ (old('status', $peminjaman->status) == 'Dikembalikan') ? 'selected' : '' }}>Dikembalikan</option>
                <option value="Terlambat" {{ (old('status', $peminjaman->status) == 'Terlambat') ? 'selected' : '' }}>Terlambat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" name="catatan" id="catatan" rows="3">{{ old('catatan', $peminjaman->catatan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('peminjaman') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
