<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:50',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'jenis_kekerasan' => 'required|string',
            'deskripsi' => 'required|string',
            'tanggal_kejadian' => 'required|date',
            'lokasi_kejadian' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan file bukti jika ada
        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('bukti', 'public');
        }

        // Set status default
        $validated['status'] = 'pending';

        // Simpan ke database
        Pengajuan::create($validated);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim!');
    }
}