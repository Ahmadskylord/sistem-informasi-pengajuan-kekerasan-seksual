<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet" />
    <style>
        :root {
            /* Filament-like colors */
            --primary: #4f46e5; /* Indigo 600 */
            --secondary: #6366f1; /* Indigo 500 */
            --accent: #a5b4fc; /* Indigo 300 for highlights */
            --success: #22c55e; /* Green 500 */
            --warning: #facc15; /* Yellow 400 */
            --danger: #ef4444; /* Red 500 */
            --dark: #1f2937; /* Gray 800 */
            --light: #f9fafb; /* Gray 50 */
            --text-color: #374151; /* Gray 700 */
            --muted-text: #6b7280; /* Gray 500 */
            --border-color: #e5e7eb; /* Gray 200 */
            --bg-body: #f3f4f6; /* Gray 100 */
            --sidebar-width: 260px; /* Lebar sidebar sedikit lebih besar */
            --header-height: 64px; /* Tinggi header */
            --card-bg: #ffffff;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif; /* Menggunakan Inter untuk nuansa modern ala Filament */
            color: var(--text-color);
            min-height: 100vh;
            overflow-x: hidden;
            display: flex; /* Memastikan kontainer utama mengisi tinggi viewport */
            flex-direction: column;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark); /* Warna gelap yang solid untuk sidebar */
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.15); /* Shadow lebih kuat */
            transition: all 0.3s ease;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        .sidebar-header h3 {
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 1.6rem; /* Ukuran font lebih besar */
            margin-bottom: 0;
            letter-spacing: 0.5px;
            color: var(--accent); /* Warna accent untuk judul */
        }
        .sidebar-header h3 i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        .sidebar-menu {
            padding: 15px 0;
            flex-grow: 1; /* Memastikan menu mengisi ruang yang tersedia */
        }
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }
        .sidebar-menu li {
            margin-bottom: 2px; /* Jarak antar item menu lebih rapat */
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 25px; /* Padding lebih besar */
            color: rgba(255, 255, 255, 0.75); /* Warna teks lebih redup */
            text-decoration: none;
            transition: all 0.2s ease-in-out; /* Transisi lebih halus */
            font-size: 15px;
            font-weight: 500;
            position: relative;
            border-left: 4px solid transparent; /* Border kiri lebih tebal */
        }
        .sidebar-menu a:hover {
            background: rgba(var(--secondary), 0.2); /* Warna hover dengan transparansi */
            color: white;
            border-left-color: var(--primary); /* Warna border saat hover */
        }
        .sidebar-menu a.active {
            background: rgba(var(--secondary), 0.3); /* Background active lebih kuat */
            color: white;
            border-left-color: var(--primary); /* Border active */
            font-weight: 600; /* Teks aktif lebih tebal */
        }
        .sidebar-menu a i {
            font-size: 18px;
            width: 30px;
            margin-right: 10px;
            text-align: center;
        }
        .sidebar-footer {
            padding: 20px; /* Padding lebih besar */
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.15); /* Background sedikit gelap */
            position: sticky; /* Sticky footer di sidebar */
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

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 25px; /* Padding lebih besar */
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
                padding-top: 80px; /* Beri ruang untuk mobile toggle */
            }
        }
        .mobile-toggle {
            display: none; /* Default hidden */
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: var(--primary);
            color: white;
            width: 45px; /* Ukuran tombol lebih besar */
            height: 45px;
            border-radius: 8px; /* Lebih membulat */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25); /* Shadow lebih jelas */
            transition: transform 0.2s ease;
        }
        .mobile-toggle:hover {
            transform: scale(1.05);
        }
        @media (max-width: 992px) {
            .mobile-toggle {
                display: flex; /* Tampilkan pada mobile */
            }
        }

        /* Header */
        .admin-header {
            background: var(--card-bg);
            border-radius: 12px; /* Border radius lebih besar */
            padding: 18px 30px; /* Padding lebih besar */
            margin-bottom: 30px; /* Jarak bawah lebih besar */
            box-shadow: var(--card-shadow); /* Shadow konsisten */
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: var(--header-height);
        }
        .header-title h1 {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 2rem; /* Ukuran font lebih besar */
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
            width: 50px; /* Avatar lebih besar */
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); /* Gradien pada avatar */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 20px; /* Font size avatar lebih besar */
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(var(--primary), 0.3); /* Shadow avatar */
        }

        /* Dashboard Content */
        .dashboard-content {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 30px; /* Padding lebih besar */
            box-shadow: var(--card-shadow);
            margin-bottom: 30px; /* Jarak bawah lebih besar */
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Ukuran kartu lebih fleksibel */
            gap: 25px; /* Jarak antar kartu */
            margin-bottom: 35px; /* Jarak bawah grid */
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px; /* Padding lebih besar */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); /* Shadow yang lebih halus */
            border-left: 5px solid var(--primary); /* Border kiri lebih tebal */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .stat-card:hover {
            transform: translateY(-8px); /* Efek hover lebih kentara */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        .stat-card.warning { border-left-color: var(--warning); }
        .stat-card.success { border-left-color: var(--success); }
        .stat-card.danger { border-left-color: var(--danger); }
        .stat-card .title {
            font-size: 1rem; /* Ukuran font sedikit lebih besar */
            color: var(--muted-text);
            margin-bottom: 8px; /* Jarak bawah title */
            font-weight: 500;
        }
        .stat-card .value {
            font-size: 2.2rem; /* Ukuran font value lebih besar */
            font-weight: 700;
            margin-bottom: 12px; /* Jarak bawah value */
            color: var(--dark);
        }
        .stat-card .info {
            display: flex;
            align-items: center;
            font-size: 0.9rem; /* Ukuran font info sedikit lebih besar */
            font-weight: 500;
        }
        .stat-card .info i {
            margin-right: 8px; /* Jarak ikon lebih besar */
            font-size: 1.1rem;
        }
        .stat-card .info.positive { color: var(--success); }
        .stat-card .info.negative { color: var(--danger); }

        /* Chart Placeholder */
        .chart-placeholder {
            background: var(--light); /* Warna lebih terang */
            height: 250px; /* Tinggi chart lebih besar */
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted-text);
            margin-bottom: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            border: 1px dashed var(--border-color); /* Border dashed */
        }
        .chart-placeholder i {
            font-size: 2.5rem; /* Ikon lebih besar */
        }

        /* Table Container */
        .table-container {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 30px; /* Padding lebih besar */
            box-shadow: var(--card-shadow);
            margin-bottom: 30px; /* Jarak bawah lebih besar */
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px; /* Jarak bawah header tabel */
        }
        .table-title {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1.8rem; /* Ukuran font judul tabel */
            color: var(--dark);
        }
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 20px;
            border-radius: 8px; /* Button radius lebih besar */
            font-weight: 600;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px); /* Efek hover button */
            box-shadow: 0 4px 10px rgba(var(--primary), 0.3);
        }
        .btn-primary i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        /* Custom Table */
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .custom-table th {
            background-color: var(--light); /* Warna header tabel lebih terang */
            color: var(--primary); /* Warna teks header */
            font-weight: 600;
            padding: 15px 20px; /* Padding lebih besar */
            text-align: left;
            border-bottom: 2px solid var(--border-color); /* Border bawah lebih tebal */
            font-size: 0.95rem;
        }
        .custom-table td {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            font-size: 0.9rem;
        }
        .custom-table tbody tr:last-child td {
            border-bottom: none; /* Hapus border pada baris terakhir */
        }
        .custom-table tbody tr:hover {
            background-color: var(--bg-body); /* Background hover baris tabel */
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 14px; /* Padding lebih besar */
            border-radius: 9999px; /* Sepenuhnya bulat */
            font-size: 0.85rem;
            font-weight: 600; /* Lebih tebal */
            display: inline-flex; /* Agar padding dan radius bekerja baik */
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
        }
        .status-badge.pending {
            background-color: #fef9c3; /* Yellow 100 */
            color: #a16207; /* Yellow 700 */
        }
        .status-badge.processing {
            background-color: #e0f2fe; /* Light Blue 100 */
            color: #0369a1; /* Light Blue 700 */
        }
        .status-badge.selesai, .status-badge.completed { /* Menyesuaikan dengan 'selesai' dan 'completed' */
            background-color: #dcfce7; /* Green 100 */
            color: #16a34a; /* Green 700 */
        }

        /* Detail Button in Table */
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

        /* Admin Footer */
        .admin-footer {
            text-align: center;
            padding: 20px;
            color: var(--muted-text);
            font-size: 0.9rem;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-top: auto; /* Mendorong footer ke bawah */
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
                        <a href="{{ route('admin.dashboard') }}" class="active">
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
                        <a href="{{ route('admin.report') }}">
                            <i class="bi bi-graph-up"></i> Laporan Statistik
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-bell"></i> Notifikasi
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
                <a href="#" class="text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi-box-arrow-right bi"></i> Logout
                </a>

        <div class="main-content">
            <div class="admin-header">
                <div class="header-title">
                    <h1>Dashboard Admin</h1>
                    <p>Selamat datang kembali, Administrator</p>
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
                        <div class="value">142</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> 12% dari bulan lalu
                        </div>
                    </div>
                    
                    <div class="stat-card warning">
                        <div class="title">Dalam Proses</div>
                        <div class="value">24</div>
                        <div class="info negative">
                            <i class="bi bi-arrow-down"></i> 3 dari minggu lalu
                        </div>
                    </div>
                    
                    <div class="stat-card success">
                        <div class="title">Terselesaikan</div>
                        <div class="value">98</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> 8% dari bulan lalu
                        </div>
                    </div>
                    
                    <div class="stat-card danger">
                        <div class="title">Pengguna Aktif</div>
                        <div class="value">1,254</div>
                        <div class="info positive">
                            <i class="bi bi-arrow-up"></i> 5.2% dari bulan lalu
                        </div>
                    </div>
                </div>
                
                <div class="chart-placeholder">
                    <i class="bi bi-bar-chart"></i> Grafik Statistik
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <div class="table-title">Pengajuan Terbaru</div>
                    <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Lihat Semua
                    </a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestPengajuan as $item)
                            <tr>
                                <td>#ITKA-{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama_pelapor }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d M Y') }}</td>
                                <td>{{ ucfirst($item->jenis_kekerasan) }}</td>
                                <td>
                                    @if($item->status == 'menunggu')
                                        <span class="status-badge pending">Menunggu</span>
                                    @elseif($item->status == 'diproses')
                                        <span class="status-badge processing">Diproses</span>
                                    @elseif($item->status == 'selesai')
                                        <span class="status-badge selesai">Selesai</span> @else
                                        <span class="status-badge">{{ ucfirst($item->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.pengajuan.show', $item->id) }}" class="btn btn-sm btn-primary" title="Detail Pengajuan">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center">Belum ada pengajuan terbaru.</td>
                            </tr>
                            @endforelse
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
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.toggle('active');
        });
        
        // Close sidebar when clicking outside
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
        
        // Add active class to menu items (this part needs dynamic handling in Laravel blade)
        const menuItems = document.querySelectorAll('.sidebar-menu a');
        menuItems.forEach(item => {
            // Check if the current URL matches the href of the menu item
            if (item.href === window.location.href) {
                item.classList.add('active');
            }
            // Optional: Add click listener for visual active state (might conflict with full page loads)
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
</html>