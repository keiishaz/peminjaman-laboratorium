@extends('layouts.app')
@section('title', 'Data Peminjaman')

@section('content')
<div class="card p-4 shadow-sm bg-white rounded">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Data Peminjaman</h2>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Tambah Peminjaman</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <input type="text" id="searchInput" placeholder="Cari nama, NPM, barang, petugas, atau status..." class="form-control mb-3" />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NPM</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Petugas</th>
                <th>Pinjam</th>
                <th>Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $p)
                <tr>
                    <td>{{ $p->nama_peminjam }}</td>
                    <td>{{ $p->npm }}</td>
                    <td>{{ $p->barang->nama_barang }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->petugas->nama_lengkap }}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali }}</td>
                    <td>{{ $p->status }}</td>
                    <td>
                        <!-- Tombol detail -->
                        <button 
                            class="btn btn-sm btn-info detail-btn"
                            data-nama="{{ $p->nama_peminjam }}"
                            data-npm="{{ $p->npm }}"
                            data-barang="{{ $p->barang->nama_barang }}"
                            data-jumlah="{{ $p->jumlah }}"
                            data-petugas="{{ $p->petugas->nama_lengkap }}"
                            data-pinjam="{{ $p->tanggal_pinjam }}"
                            data-kembali="{{ $p->tanggal_kembali }}"
                            data-dikembalikan="{{ $p->tanggal_dikembalikan ?? '-' }}"
                            data-status="{{ $p->status }}"
                            data-catatan="{{ $p->catatan ?? '-' }}"
                        >
                            🔍
                        </button>

                        <a href="{{ route('peminjaman.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr><th>Nama Peminjam</th><td id="detail-nama"></td></tr>
            <tr><th>NPM</th><td id="detail-npm"></td></tr>
            <tr><th>Barang</th><td id="detail-barang"></td></tr>
            <tr><th>Jumlah</th><td id="detail-jumlah"></td></tr>
            <tr><th>Petugas</th><td id="detail-petugas"></td></tr>
            <tr><th>Tanggal Pinjam</th><td id="detail-pinjam"></td></tr>
            <tr><th>Tanggal Kembali</th><td id="detail-kembali"></td></tr>
            <tr><th>Tanggal Dikembalikan</th><td id="detail-dikembalikan"></td></tr>
            <tr><th>Status</th><td id="detail-status"></td></tr>
            <tr><th>Catatan</th><td id="detail-catatan"></td></tr>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
    // Filter pencarian
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const nama = row.cells[0].textContent.toLowerCase();
            const npm = row.cells[1].textContent.toLowerCase();
            const barang = row.cells[2].textContent.toLowerCase();
            const petugas = row.cells[4].textContent.toLowerCase();
            const status = row.cells[7].textContent.toLowerCase();

            if (
                nama.includes(keyword) ||
                npm.includes(keyword) ||
                barang.includes(keyword) ||
                petugas.includes(keyword) ||
                status.includes(keyword)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Modal detail
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('detail-nama').textContent = this.dataset.nama;
            document.getElementById('detail-npm').textContent = this.dataset.npm;
            document.getElementById('detail-barang').textContent = this.dataset.barang;
            document.getElementById('detail-jumlah').textContent = this.dataset.jumlah;
            document.getElementById('detail-petugas').textContent = this.dataset.petugas;
            document.getElementById('detail-pinjam').textContent = this.dataset.pinjam;
            document.getElementById('detail-kembali').textContent = this.dataset.kembali;
            document.getElementById('detail-dikembalikan').textContent = this.dataset.dikembalikan;
            document.getElementById('detail-status').textContent = this.dataset.status;
            document.getElementById('detail-catatan').textContent = this.dataset.catatan;

            const myModal = new bootstrap.Modal(document.getElementById('detailModal'));
            myModal.show();
        });
    });
</script>
@endsection
