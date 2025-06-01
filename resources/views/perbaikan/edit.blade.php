@extends('layouts.app')
@section('title', 'Edit Perbaikan')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <h2 class="text-primary mb-4">Edit Perbaikan</h2>

    <form action="{{ route('perbaikan.update', $perbaikan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Alat</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Alat --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $perbaikan->barang_id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="petugas_id" class="form-label">Pilih Petugas</label>
            <select name="petugas_id" id="petugas_id" class="form-select" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $perbaikan->petugas_id ? 'selected' : '' }}>
                        {{ $p->nama_lengkap ?? $p->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lapor" class="form-label">Tanggal Lapor</label>
            <input type="date" name="tanggal_lapor" id="tanggal_lapor" class="form-control" required
                value="{{ old('tanggal_lapor', $perbaikan->tanggal_lapor) }}">
        </div>

        <div class="mb-3">
            <label for="kerusakan" class="form-label">Kerusakan</label>
            <textarea name="kerusakan" id="kerusakan" class="form-control" required>{{ old('kerusakan', $perbaikan->kerusakan) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Dilaporkan" {{ old('status', $perbaikan->status) == 'Dilaporkan' ? 'selected' : '' }}>Dilaporkan</option>
                <option value="Dalam Perbaikan" {{ old('status', $perbaikan->status) == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                <option value="Selesai" {{ old('status', $perbaikan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <textarea name="tindakan" id="tindakan" class="form-control">{{ old('tindakan', $perbaikan->tindakan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Perbaikan</button>
        <a href="{{ route('perbaikan.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
