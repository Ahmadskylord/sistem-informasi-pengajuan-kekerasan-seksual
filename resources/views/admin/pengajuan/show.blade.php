@extends('layout.admin')
@section('title', 'Detail Pengajuan')

@section('content')
<h2 class="mb-4">Detail Pengajuan</h2>

<div class="shadow-sm card">
    <div class="card-body">
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Nama Pelapor:</div>
            <div class="col-md-8">{{ $item->nama_pelapor }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">NIM/NIDN:</div>
            <div class="col-md-8">{{ $item->nim_nidn }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Email:</div>
            <div class="col-md-8">{{ $item->email }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Telepon:</div>
            <div class="col-md-8">{{ $item->telepon }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Jenis Kekerasan:</div>
            <div class="col-md-8">{{ ucfirst($item->jenis_kekerasan) }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Deskripsi Kejadian:</div>
            <div class="col-md-8">{{ $item->deskripsi }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Tanggal Kejadian:</div>
            <div class="col-md-8">{{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d M Y') }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Lokasi Kejadian:</div>
            <div class="col-md-8">{{ $item->lokasi_kejadian }}</div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Bukti:</div>
            <div class="col-md-8">
                @if($item->bukti)
                    <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank" class="btn-outline-primary btn btn-sm">Lihat Bukti</a>
                @else
                    <span>Tidak ada bukti yang diunggah.</span>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4 fw-bold">Status:</div>
            <div class="col-md-8">{{ ucfirst($item->status) }}</div>
        </div>
        <a href="{{ route('admin.pengajuan.index') }}" class="mt-3 btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
