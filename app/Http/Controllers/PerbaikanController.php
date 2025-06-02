<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Petugas;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerbaikanController extends Controller
{
    public function index()
    {
        $perbaikans = Perbaikan::with('barang', 'petugas')->get();
        return view('perbaikan.index', compact('perbaikans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $petugas = Petugas::all();
        return view('perbaikan.create', compact('barangs', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'petugas_id' => 'required|exists:petugas,id',
            'tanggal_lapor' => 'required|date',
            'kerusakan' => 'required|string',
            'status' => 'in:Dilaporkan,Dalam Perbaikan,Selesai',
            'tindakan' => 'nullable|string',
        ]);
        Perbaikan::create($request->all());
        return redirect()->route('perbaikan.index')->with('success', 'Data perbaikan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $perbaikan = Perbaikan::findOrFail($id);
        $barangs = Barang::all();
        $petugas = Petugas::all();
        return view('perbaikan.edit', compact('perbaikan', 'barangs', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'petugas_id' => 'required|exists:petugas,id',
            'tanggal_lapor' => 'required|date',
            'kerusakan' => 'required|string',
            'status' => 'in:Dilaporkan,Dalam Perbaikan,Selesai',
            'tindakan' => 'nullable|string',
        ]);
        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->update($request->all());
        return redirect()->route('perbaikan.index')->with('success', 'Data perbaikan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->delete();
        return redirect()->route('perbaikan.index')->with('success', 'Data perbaikan berhasil dihapus');
    }
}
