<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'nullable',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:Baik,Rusak,Habis',
        ]);

        $data = $request->only(['nama_barang', 'spesifikasi', 'stok', 'kondisi']);

        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Data alat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'nullable',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:Baik,Rusak,Habis',
        ]);

        $data = $request->only(['nama_barang', 'spesifikasi', 'stok', 'kondisi']);

        $barang->update($data);
        return redirect()->route('barang.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
