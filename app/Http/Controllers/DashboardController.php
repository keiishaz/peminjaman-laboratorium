<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Perbaikan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
    $user = Auth::guard('petugas')->user();

    $totalBarangs = Barang::count();
    $totalPeminjamanAktif = Peminjaman::where('status', 'Dipinjam')->count();
    $totalPerbaikanBerjalan = Perbaikan::where('status', 'Dalam Perbaikan')->count();

    // Data untuk grafik peminjaman bulanan
    $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    $dataPeminjaman = [];

    foreach (range(1, 12) as $i) {
        $jumlah = Peminjaman::whereMonth('created_at', $i)->count();
        $dataPeminjaman[] = $jumlah;
    }

    return view('dashboard', compact(
        'user',
        'totalBarangs',
        'totalPeminjamanAktif',
        'totalPerbaikanBerjalan',
        'bulan',
        'dataPeminjaman'
    ));
    }

}
