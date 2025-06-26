{{-- filepath: c:\xampp\htdocs\laravel\resources\views\login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Pengajuan Kekerasan Seksual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue-primary: #3b82f6; /* Tailwind blue-500 */
            --blue-dark: #2563eb;    /* Tailwind blue-600 */
            --blue-light: #60a5fa;   /* Tailwind blue-400 */
            --text-dark: #1f2937;    /* Gray 800 */
            --text-muted: #6b7280;   /* Gray 500 */
            --card-bg: #ffffff;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        body {
            background: linear-gradient(135deg, var(--blue-dark) 0%, var(--blue-light) 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex; /* Menggunakan flexbox untuk centering */
            justify-content: center;
            align-items: center;
            color: var(--text-dark); /* Warna teks default */
        }
        .login-card {
            border-radius: 18px;
            box-shadow: var(--card-shadow);
            background: var(--card-bg); /* Warna putih solid untuk kartu */
            padding: 3rem 2.5rem; /* Padding lebih besar */
            transition: all 0.3s ease; /* Transisi untuk efek hover atau fokus */
            max-width: 420px; /* Lebar maksimum kartu sedikit diperbesar */
            width: 100%;
        }
        .login-card:hover {
            transform: translateY(-5px); /* Efek melayang saat hover */
            box-shadow: 0 15px 30px -8px rgba(0, 0, 0, 0.15), 0 10px 15px -7px rgba(0, 0, 0, 0.1);
        }
        .login-logo {
            width: 80px; /* Ukuran logo diperbesar */
            margin-bottom: 20px; /* Jarak bawah logo diperbesar */
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1)); /* Shadow pada logo */
        }
        .login-title {
            color: var(--blue-dark); /* Warna judul sesuai tema biru */
            font-weight: 700;
            margin-bottom: 0.75rem; /* Jarak bawah judul */
            font-size: 2.2rem; /* Ukuran font judul diperbesar */
        }
        .login-subtitle { /* Menambahkan kelas untuk subtitle */
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 1.5rem; /* Jarak bawah subtitle */
        }
        .form-label {
            color: var(--text-dark); /* Warna label sesuai tema */
            font-weight: 600; /* Font label lebih tebal */
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        .form-control {
            border-radius: 10px; /* Input field lebih bulat */
            padding: 0.75rem 1rem; /* Padding input field */
            border: 1px solid #d1d5db; /* Border default */
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .form-control:focus {
            border-color: var(--blue-primary); /* Border fokus biru */
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2); /* Shadow fokus biru */
            outline: none; /* Hilangkan outline default */
        }
        .login-btn {
            background: linear-gradient(90deg, var(--blue-dark) 0%, var(--blue-primary) 100%); /* Gradien biru pada tombol */
            color: #fff !important;
            border-radius: 12px; /* Tombol lebih bulat */
            font-weight: 700; /* Font tombol lebih tebal */
            box-shadow: 0 8px 20px -5px rgba(59, 130, 246, 0.3); /* Shadow tombol */
            transition: all 0.3s ease;
            border: none;
            padding: 0.75rem 1.5rem; /* Padding tombol */
            font-size: 1.1rem;
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #1d4ed8 0%, #3b82f6 100%); /* Gradien sedikit lebih gelap saat hover */
            transform: translateY(-3px); /* Efek tombol melayang saat hover */
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }
        .text-footer { /* Kelas baru untuk footer text */
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 1.5rem;
        }
        .alert-danger {
            background-color: #fef2f2; /* Red 50 */
            color: #ef4444; /* Red 500 */
            border-color: #fee2e2; /* Red 200 */
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Admin" class="login-logo">
            <h3 class="login-title">Login Admin</h3>
            <p class="login-subtitle">Sistem Pengajuan Kekerasan Seksual</p> </div>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4"> <label for="email" class="form-label">Email Admin</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="admin@email.com" required autofocus>
            </div>
            <div class="mb-4"> <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>
            <button type="submit" class="btn login-btn w-100">Login</button>
        </form>
        <div class="text-center text-footer">
            <small>© {{ date('Y') }} ITKA Aspirasi</small>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>