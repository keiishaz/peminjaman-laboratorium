<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Petugas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('barang', 'petugas')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $petugas = Petugas::all();
        return view('peminjaman.create', compact('barangs', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'petugas_id' => 'required|exists:petugas,id',
            'nama_peminjam' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'in:Dipinjam,Dikembalikan,Terlambat',
            'catatan' => 'nullable|string',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barangs = Barang::all();
        $petugas = Petugas::all();
        return view('peminjaman.edit', compact('peminjaman', 'barangs', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'petugas_id' => 'required|exists:petugas,id',
            'nama_peminjam' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'tanggal_dikembalikan' => 'nullable|date',
            'status' => 'in:Dipinjam,Dikembalikan,Terlambat',
            'catatan' => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman')->with('success', 'Peminjaman berhasil dihapus');
    }
}
