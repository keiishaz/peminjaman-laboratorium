<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Perbaikan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('petugas')->user();

        $totalBarangs = Barang::count();
        $totalPeminjamanAktif = Peminjaman::where('status', 'Dipinjam')->count();
        $totalPerbaikanBerjalan = Perbaikan::where('status', 'Dalam Perbaikan')->count();

        return view('dashboard', compact(
            'user',
            'totalBarangs',
            'totalPeminjamanAktif',
            'totalPerbaikanBerjalan'
        ));
    }
}
