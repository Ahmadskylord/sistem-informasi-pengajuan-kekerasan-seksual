<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use PDF; // gunakan barryvdh/laravel-dompdf

class PengajuanAdminController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::orderBy('created_at', 'desc')->get();
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function show($id)
    {
        $item = Pengajuan::findOrFail($id);
        return view('admin.pengajuan.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Pengajuan::findOrFail($id);
        return view('admin.pengajuan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Pengajuan::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);
        $item->update([
            'status' => $request->status
        ]);
        return redirect()->route('admin.pengajuan.index')->with('success', 'Status pengajuan diperbarui!');
    }

    public function destroy($id)
    {
        $item = Pengajuan::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan berhasil dihapus!');
    }

    public function exportPdf()
    {
        \Log::info('Export PDF method called');
        $pengajuan = Pengajuan::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('admin.pengajuan.export_pdf', compact('pengajuan'));
        return $pdf->download('data_pengajuan.pdf');
    }
}