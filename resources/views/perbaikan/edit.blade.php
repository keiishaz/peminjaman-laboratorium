@extends('layouts.app')
@section('title', 'Edit Perbaikan')

@section('content')
    <h1>Edit Data Perbaikan</h1>

    <form action="{{ route('perbaikan.update', $perbaikan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $perbaikan->barang_id == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="petugas_id" class="form-label">Petugas</label>
            <select name="petugas_id" id="petugas_id" class="form-control" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ $perbaikan->petugas_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_lengkap }}
                    </option>
                @endforeach
            </select>
            @error('petugas_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_lapor" class="form-label">Tanggal Lapor</label>
            <input type="date" name="tanggal_lapor" id="tanggal_lapor" class="form-control" value="{{ $perbaikan->tanggal_lapor }}" required>
            @error('tanggal_lapor')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="kerusakan" class="form-label">Kerusakan</label>
            <textarea name="kerusakan" id="kerusakan" class="form-control" rows="3" required>{{ $perbaikan->kerusakan }}</textarea>
            @error('kerusakan')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Dilaporkan" {{ $perbaikan->status == 'Dilaporkan' ? 'selected' : '' }}>Dilaporkan</option>
                <option value="Dalam Perbaikan" {{ $perbaikan->status == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                <option value="Selesai" {{ $perbaikan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan (optional)</label>
            <textarea name="tindakan" id="tindakan" class="form-control" rows="3">{{ $perbaikan->tindakan }}</textarea>
            @error('tindakan')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perbaikan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
