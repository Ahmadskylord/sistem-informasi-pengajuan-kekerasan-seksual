<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITKA | Pengajuan Kekerasan Seksual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
</head>
<body>
<nav class="fixed-top shadow-sm navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/itka.png') }}" alt="ITKA Logo" class="navbar-logo">
            ITKA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-lg-transparent" id="navbarNav">
            <ul class="gap-lg-2 ms-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Prodi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Teknologi Informasi</a></li>
                        <li><a class="dropdown-item" href="#">Administrasi Kesehatan</a></li>
                        <li><a class="dropdown-item" href="#">Teknik Sipil</a></li>
                        <li><a class="dropdown-item" href="#">Teknologi Pangan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sistem">Tentang Sistem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak Darurat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-btn" href="{{ route('login') }}">
                        <i class="me-1 fas fa-user-shield"></i>Login Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="text-center hero">
    <div class="container">
        <img src="{{ asset('image/itka.png') }}"  width="100" class="mb-4" alt="Logo">
        <h1 class="mb-3 animate-scroll display-5 fw-bold">Sistem Pengajuan Kekerasan Seksual</h1>
        <h4 class="mb-4 animate-scroll">Institut Teknologi dan Kesehatan Aspirasi</h4>
        <p class="mb-4 animate-scroll lead">
            Laporkan dan dapatkan informasi terkait kekerasan seksual di lingkungan kampus secara <span class="fw-bold">aman</span>, <span class="fw-bold">cepat</span>, dan <span class="fw-bold">rahasia</span>.
        </p>
        <p class="mb-2 animate-scroll">
            Kekerasan seksual adalah tindakan yang merendahkan, melecehkan, atau menyerang tubuh dan fungsi seksual seseorang tanpa persetujuan. Bentuknya bisa berupa pelecehan verbal, fisik, maupun non-fisik, dan dapat terjadi di mana saja, termasuk lingkungan kampus.
        </p>
        <p class="mb-2 animate-scroll">
            Setiap individu berhak mendapatkan perlindungan dari segala bentuk kekerasan seksual. Melalui sistem ini, kami berkomitmen untuk memberikan ruang aman bagi korban agar dapat melapor tanpa rasa takut dan stigma.
        </p>
        <a href="{{ route('form-pengajuan') }}" class="shadow px-5 animate-scroll btn btn-danger btn-lg">Ajukan Pengajuan</a>
    </div>
</section>

<section id="sistem" class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center animate-scroll section-title">Tentang Sistem</h2>
        <div class="justify-content-center row">
            <div class="col-md-8">
                <div class="p-4 animate-scroll card info-card">
                    <p>
                        Sistem Pengajuan Kekerasan Seksual ITKA adalah platform digital yang memudahkan mahasiswa, dosen, dan civitas akademika untuk melaporkan, memantau, dan mendapatkan penanganan kasus kekerasan seksual secara cepat, aman, dan rahasia. Setiap laporan akan ditangani oleh tim profesional dan terlatih.
                    </p>
                    <p>
                        Kekerasan seksual dapat berdampak serius pada kesehatan fisik dan mental korban. Oleh karena itu, penting untuk segera melapor agar mendapatkan pendampingan dan perlindungan yang tepat.
                    </p>
                    <p>
                        Melalui sistem ini, pelapor akan mendapatkan akses ke layanan konseling, pendampingan hukum, serta informasi terkait hak-hak korban kekerasan seksual. Identitas pelapor dijamin kerahasiaannya oleh pihak kampus.
                    </p>
                    <ul>
                        <li>Proses pelaporan mudah dan cepat</li>
                        <li>Data pelapor dijamin kerahasiaannya</li>
                        <li>Didukung tim konselor dan satgas kampus</li>
                        <li>Monitoring status pengajuan secara real-time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="alur" class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center animate-scroll section-title">Alur Pengajuan</h2>
        <div class="justify-content-center row g-4">
            <div class="col-md-3">
                <div class="p-3 h-100 text-center animate-scroll card alur-card">
                    <div class="mb-2 alur-icon"><i class="fas fa-edit"></i></div>
                    <h5 class="fw-bold">Isi Formulir</h5>
                    <p>Mahasiswa mengisi form pengajuan secara online melalui sistem.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 h-100 text-center animate-scroll card alur-card">
                    <div class="mb-2 alur-icon"><i class="fas fa-user-secret"></i></div>
                    <h5 class="fw-bold">Verifikasi & Kerahasiaan</h5>
                    <p>Tim satgas memverifikasi laporan dan menjaga kerahasiaan identitas pelapor.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 h-100 text-center animate-scroll card alur-card">
                    <div class="mb-2 alur-icon"><i class="fas fa-users"></i></div>
                    <h5 class="fw-bold">Pendampingan</h5>
                    <p>Pelapor mendapat pendampingan dan penanganan sesuai kebutuhan.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 h-100 text-center animate-scroll card alur-card">
                    <div class="mb-2 alur-icon"><i class="fas fa-check-circle"></i></div>
                    <h5 class="fw-bold">Selesai & Monitoring</h5>
                    <p>Status pengajuan dapat dipantau hingga kasus selesai ditangani.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimoni" class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center animate-scroll section-title">Testimoni</h2>
        <div class="justify-content-center row g-4">
            <div class="col-md-4">
                <div class="p-4 h-100 text-center animate-scroll card testi-card">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="mx-auto testi-img" alt="Testimoni">
                    <p class="fst-italic">"Sistem ini sangat membantu saya melapor tanpa takut identitas saya tersebar."</p>
                    <h6 class="mb-0 fw-bold">Ayu, Mahasiswa TI</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 h-100 text-center animate-scroll card testi-card">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="mx-auto testi-img" alt="Testimoni">
                    <p class="fst-italic">"Prosesnya cepat dan tim satgas sangat profesional."</p>
                    <h6 class="mb-0 fw-bold">Budi, Mahasiswa Teknik Sipil</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 h-100 text-center animate-scroll card testi-card">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" class="mx-auto testi-img" alt="Testimoni">
                    <p class="fst-italic">"Saya merasa aman dan didampingi selama proses pengajuan."</p>
                    <h6 class="mb-0 fw-bold">Sinta, Mahasiswa Adm. Kesehatan</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="kontak" class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center animate-scroll section-title">Kontak Darurat</h2>
        <div class="justify-content-center row">
            <div class="col-md-6">
                <div class="p-4 animate-scroll card contact-card">
                    <ul class="mb-0 list-unstyled">
                        <li><i class="me-2 fas fa-shield-alt"></i><strong>Satgas Kampus:</strong> 0812-XXXX-XXXX</li>
                        <li><i class="me-2 fas fa-phone-alt"></i><strong>Polisi:</strong> 110</li>
                        <li><i class="me-2 fas fa-ambulance"></i><strong>Pusat Krisis:</strong> 119</li>
                        <li><i class="me-2 fas fa-envelope"></i><strong>Email:</strong> satgas@itkaaspirasi.ac.id</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="mt-5 pt-4 pb-3 text-lg-start text-center footer-main" style="background: #795548; color: #fff;">
    <div class="container">
        <div class="align-items-center mb-3 row gy-4">
            <div class="mb-3 mb-lg-0 text-lg-start text-center col-lg-4">
                <img src="{{ asset('image/itka.png') }}" alt="Logo" width="48" class="mb-2">
                <div class="fw-bold" style="font-size:1.2rem;">Institut Teknologi dan Kesehatan Aspirasi</div>
                <div style="font-size:0.95rem;">Sistem Pengajuan Kekerasan Seksual</div>
            </div>
            <div class="mb-3 mb-lg-0 col-lg-4">
                <div class="mb-2 fw-semibold">Navigasi</div>
                <a href="#" class="footer-link">Home</a> &bull;
                <a href="#sistem" class="footer-link">Tentang Sistem</a> &bull;
                <a href="#alur" class="footer-link">Alur</a> &bull;
                <a href="#testimoni" class="footer-link">Testimoni</a> &bull;
                <a href="#kontak" class="footer-link">Kontak</a>
            </div>
            <div class="text-lg-end text-center col-lg-4">
                <div class="mb-2 fw-semibold">Kontak & Sosial Media</div>
                <div class="mb-2 small">
                    <i class="me-1 fas fa-envelope"></i> satgas@itkaaspirasi.ac.id<br>
                    <i class="me-1 fas fa-phone-alt"></i> 0812-XXXX-XXXX
                </div>
                <a href="#" class="mx-1 footer-social" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="mx-1 footer-social" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="mx-1 footer-social" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="mx-1 footer-social" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <hr style="border-color: #a1887f;">
        <div class="text-center small" style="color:#ffd180;">
            &copy; {{ date('Y') }} Institut Teknologi dan Kesehatan Aspirasi. All rights reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
