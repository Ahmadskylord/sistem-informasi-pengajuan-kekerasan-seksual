<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $guarded = [];

    protected $fillable = [
        'nama_pelapor', 'nim_nidn', 'email', 'telepon', 'jenis_kekerasan',
        'deskripsi', 'tanggal_kejadian', 'lokasi_kejadian', 'bukti', 'status'
    ];
}