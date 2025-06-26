@extends('layout.admin')
@section('title', 'Data Pengajuan')

@section('content')
<h2 class="mb-4">Data Pengajuan</h2>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card">
    <div class="table-responsive card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Email</th>
                    <th>Jenis Kekerasan</th>
                    <th>Tanggal Kejadian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pelapor }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ ucfirst($item->jenis_kekerasan) }}</td>
                    <td>{{ $item->tanggal_kejadian }}</td>
                    <td>
                        <span class="bg-info badge">{{ ucfirst($item->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.pengajuan.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        <a href="{{ route('admin.pengajuan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.pengajuan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada pengajuan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
