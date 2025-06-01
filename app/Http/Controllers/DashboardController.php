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

        // Statistik
        $totalBarangs = Barang::count();
        $totalPeminjamanAktif = Peminjaman::where('status', 'Dipinjam')->count();
        $totalPerbaikanBerjalan = Perbaikan::where('status', 'Dalam Perbaikan')->count();

        // Bulan dan Data Peminjaman Tahun Berjalan
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $dataPeminjaman = [];
        $year = Carbon::now()->year;

        for ($i = 1; $i <= 12; $i++) {
            $jumlah = Peminjaman::whereYear('created_at', $year)
                                ->whereMonth('created_at', $i)
                                ->count();
            $dataPeminjaman[] = $jumlah;
        }

        // Persentase perubahan
        $currentMonth = Carbon::now()->month;
        $lastMonth = Carbon::now()->subMonth()->month;

        $pinjamBulanIni = Peminjaman::whereYear('created_at', $year)
                                    ->whereMonth('created_at', $currentMonth)
                                    ->count();

        $pinjamBulanLalu = Peminjaman::whereYear('created_at', $year)
                                     ->whereMonth('created_at', $lastMonth)
                                     ->count();

        $persenPinjam = $pinjamBulanLalu > 0
            ? round((($pinjamBulanIni - $pinjamBulanLalu) / $pinjamBulanLalu) * 100)
            : 0;

        // Status perbaikan untuk doughnut chart
        $statusPerbaikan = Perbaikan::select('status')
            ->selectRaw('count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        return view('dashboard', compact(
            'user',
            'totalBarangs',
            'totalPeminjamanAktif',
            'totalPerbaikanBerjalan',
            'bulan',
            'dataPeminjaman',
            'pinjamBulanIni',
            'pinjamBulanLalu',
            'persenPinjam',
            'statusPerbaikan'
        ));
    }
}
