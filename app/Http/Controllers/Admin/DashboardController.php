<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Pengajuan::count();
        $menunggu = Pengajuan::where('status', 'menunggu')->count();
        $diproses = Pengajuan::where('status', 'diproses')->count();
        $selesai = Pengajuan::where('status', 'selesai')->count();
        $userCount = User::count();

        $chartData = [
            'labels' => ['Menunggu', 'Diproses', 'Selesai'],
            'data' => [$menunggu, $diproses, $selesai]
        ];

        $latestPengajuan = Pengajuan::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('total', 'menunggu', 'diproses', 'selesai', 'chartData', 'userCount', 'latestPengajuan'));
    }

    public function report()
    {
        $total = Pengajuan::count();
        $diproses = Pengajuan::where('status', 'diproses')->count();
        $selesai = Pengajuan::where('status', 'selesai')->count();
        $userCount = User::count();
        $pengajuan = Pengajuan::orderBy('created_at', 'desc')->get();

        return view('admin.report', compact('total', 'diproses', 'selesai', 'userCount', 'pengajuan'));
    }
}