@extends('layout.admin')
@section('title', 'Edit Pengajuan')

@section('content')
<h2 class="mb-4">Edit Pengajuan</h2>

<div class="shadow-sm card">
    <div class="card-body">
        <form action="{{ route('admin.pengajuan.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="">Pilih status</option>
                    <option value="pending" {{ old('status', $item->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status', $item->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ old('status', $item->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="{{ route('admin.pengajuan.index') }}" class="ms-2 btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection