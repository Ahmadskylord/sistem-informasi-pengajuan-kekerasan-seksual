<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan dan Statistik Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet" />
    <style>
        /* Reuse styles from dashboard for consistency */
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --accent: #a5b4fc;
            --success: #22c55e;
            --warning: #facc15;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f9fafb;
            --text-color: #374151;
            --muted-text: #6b7280;
            --border-color: #e5e7eb;
            --bg-body: #f3f4f6;
            --sidebar-width: 260px;
            --header-height: 64px;
            --card-bg: #ffffff;
            --card-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        }
        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }
        .admin-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .sidebar-header h3 {
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 1.6rem;
            margin-bottom: 0;
            letter-spacing: 0.5px;
            color: var(--accent);
        }
        .sidebar-header h3 i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        .sidebar-menu {
            padding: 15px 0;
            flex-grow: 1;
        }
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }
        .sidebar-menu li {
            margin-bottom: 2px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            font-size: 15px;
            font-weight: 500;
            position: relative;
            border-left: 4px solid transparent;
        }
        .sidebar-menu a:hover {
            background: rgba(var(--secondary), 0.2);
            color: white;
            border-left-color: var(--primary);
        }
        .sidebar-menu a.active {
            background: rgba(var(--secondary), 0.3);
            color: white;
            border-left-color: var(--primary);
            font-weight: 600;
        }
        .sidebar-menu a i {
            font-size: 18px;
            width: 30px;
            margin-right: 10px;
            text-align: center;
        }
        .sidebar-footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.15);
            position: sticky;
            bottom: 0;
            width: 100%;
        }
        .sidebar-footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .sidebar-footer a:hover {
            color: white;
        }
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 25px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding-top: 80px;
            }
        }
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: var(--primary);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            transition: transform 0.2s ease;
        }
        .mobile-toggle:hover {
            transform: scale(1.05);
        }
        @media (max-width: 992px) {
            .mobile-toggle {
                display: flex;
            }
        }
        .admin-header {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 18px 30px;
            margin-bottom: 30px;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: var(--header-height);
        }
        .header-title h1 {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0;
            color: var(--dark);
        }
        .header-title p {
            color: var(--muted-text);
            margin-bottom: 0;
            font-size: 0.95rem;
        }
        .user-menu {
            display: flex;
            align-items: center;
        }
        .user-info {
            text-align: right;
            margin-right: 15px;
        }
        .user-info .name {
            font-weight: 600;
            color: var(--dark);
        }
        .user-info .role {
            font-size: 0.85rem;
            color: var(--muted-text);
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(var(--primary), 0.3);
        }
        .dashboard-content {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-left: 5px solid var(--primary);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .stat-card.warning { border-left-color: var(--warning); }
        .stat-card.success { border-left-color: var(--success); }
        .stat-card.danger { border-left-color: var(--danger); }
        .stat-card .title {
            font-size: 1rem;
            color: var(--muted-text);
            margin-bottom: 8px;
            font-weight: 500;
        }
        .stat-card .value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--dark);
        }
        .stat-card .info {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .stat-card .info i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        .stat-card .info.positive { color: var(--success); }
        .stat-card .info.negative { color: var(--danger); }
        .chart-placeholder {
            background: var(--light);
            height: 250px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted-text);
            margin-bottom: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            border: 1px dashed var(--border-color);
        }
        .chart-placeholder i {
            font-size: 2.5rem;
        }
        .table-container {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .table-title {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--dark);
        }
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(var(--primary), 0.3);
        }
        .btn-primary i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .custom-table th {
            background-color: var(--light);
            color: var(--primary);
            font-weight: 600;
            padding: 15px 20px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            font-size: 0.95rem;
        }
        .custom-table td {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            font-size: 0.9rem;
        }
        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }
        .custom-table tbody tr:hover {
            background-color: var(--bg-body);
        }
        .status-badge {
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
        }
        .status-badge.pending {
            background-color: #fef9c3;
            color: #a16207;
        }
        .status-badge.processing {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        .status-badge.selesai, .status-badge.completed {
            background-color: #dcfce7;
            color: #16a34a;
        }
        .btn-sm.btn-primary {
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 6px;
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        .btn-sm.btn-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        .admin-footer {
            text-align: center;
            padding: 20px;
            color: var(--muted-text);
            font-size: 0.9rem;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="mobile-toggle" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </div>
        <div class="sidebar" id="adminSidebar">
            <div class="sidebar-header">
                <h3><i class="bi bi-shield-lock"></i> Admin Panel</h3>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pengajuan.index') }}">
                            <i class="bi bi-inbox"></i> Data Pengajuan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pengajuan.exportPdf') }}">
                            <i class="bi bi-file-earmark-pdf"></i> Export PDF
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.report') }}" class="active">
                            <i class="bi bi-graph-up"></i> Laporan & Statistik
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-people"></i> Manajemen User
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-gear"></i> Pengaturan Sistem
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-bell"></i> Notifikasi
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-footer">
                <a href="#" class="text-white">
                    <i class="bi-box-arrow-right bi"></i> Logout
                </a>
            </div>
        </div>
        <div class="main-content">
            <div class="admin-header">
                <div class="header-title">
                    <h1>Laporan dan Statistik</h1>
                    <p>Ringkasan data pengajuan dan pengguna</p>
                </div>
                <div class="user-menu">
                    <div class="user-info">
                        <div class="name">Admin ITKA</div>
                        <div class="role">Super Administrator</div>
                    </div>
                    <div class="user-avatar">A</div>
                </div>
            </div>
            <div class="dashboard-content">
                <div class="card-grid">
                    <div class="stat-card">
                        <div class="title">Total Pengajuan</div>
                        <div class="value">{{ $total }}</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> dari bulan lalu
                        </div>
                    </div>
                    <div class="stat-card warning">
                        <div class="title">Dalam Proses</div>
                        <div class="value">{{ $diproses }}</div>
                        <div class="info negative">
                            <i class="bi bi-arrow-down"></i> dari minggu lalu
                        </div>
                    </div>
                    <div class="stat-card success">
                        <div class="title">Terselesaikan</div>
                        <div class="value">{{ $selesai }}</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> dari bulan lalu
                        </div>
                    </div>
                    <div class="stat-card danger">
                        <div class="title">Pengguna Aktif</div>
                        <div class="value">{{ $userCount }}</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> dari bulan lalu
                        </div>
                    </div>
                </div>
                <div class="chart-placeholder">
                    <i class="bi bi-bar-chart"></i> Grafik Statistik (Placeholder)
                </div>
            </div>
            <div class="table-container">
                <div class="table-header">
                    <div class="table-title">Data Pengajuan Lengkap</div>
                </div>
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID Pengajuan</th>
                                <th>Nama User</th>
                                <th>Tanggal Kejadian</th>
                                <th>Jenis Kasus</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan as $item)
                            <tr>
                                <td>#ITKA-{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama_pelapor }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d M Y') }}</td>
                                <td>{{ ucfirst($item->jenis_kekerasan) }}</td>
                                <td>{{ ucfirst($item->status) }}</td>
                            </tr>
                            @endforeach
                            @if($pengajuan->isEmpty())
                            <tr>
                                <td colspan="5" class="py-4 text-center">Belum ada data pengajuan.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="admin-footer">
                &copy; 2023 Institut Teknologi dan Kesehatan Aspirasi - Sistem Pengajuan Kekerasan Seksual
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.toggle('active');
        });
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            if (window.innerWidth <= 992 &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        const menuItems = document.querySelectorAll('.sidebar-menu a');
        menuItems.forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add('active');
            }
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
</create_file>
