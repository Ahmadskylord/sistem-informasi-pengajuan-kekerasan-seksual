<!DOCTYPE html>
<html>
<head>
    <title>Data Pengajuan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #aaa; padding: 6px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Data Pengajuan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelapor</th>
                <th>Email</th>
                <th>Jenis Kekerasan</th>
                <th>Tanggal Kejadian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_pelapor }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ ucfirst($item->jenis_kekerasan) }}</td>
                <td>{{ $item->tanggal_kejadian }}</td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>