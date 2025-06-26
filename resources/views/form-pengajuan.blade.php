<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8e44ad;
            --primary-dark: #732d91;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --gradient-start: #8e44ad;
            --gradient-end: #3498db;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Background Elements */
        .bg-element {
            position: absolute;
            z-index: 0;
        }
        
        .circle-1 {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            top: 10%;
            left: 10%;
        }
        
        .circle-2 {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            bottom: 10%;
            right: 10%;
        }
        
        .triangle {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-bottom: 180px solid rgba(255, 255, 255, 0.03);
            transform: rotate(45deg);
            top: 20%;
            right: 15%;
        }
        
        /* Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 550px;
            width: 100%;
            position: relative;
            z-index: 10;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(0);
            transition: all 0.4s ease;
            animation: float 6s ease-in-out infinite;
        }
        
        .form-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .form-card h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        
        .form-card h3:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            border-radius: 10px;
        }
        
        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 10px;
            color: var(--primary);
            font-size: 18px;
            width: 24px;
            text-align: center;
        }
        
        .form-control, .form-select {
            border-radius: 12px;
            padding: 14px 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25);
            background: white;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .alert {
            border-radius: 12px;
            margin-bottom: 25px;
            font-weight: 500;
            padding: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .alert-success {
            background: linear-gradient(to right, #d4edda, #c3e6cb);
            color: #155724;
        }
        
        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border: none;
            border-radius: 12px;
            padding: 16px 0;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.3);
        }
        
        .btn-primary:before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-primary:hover:before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(106, 17, 203, 0.4);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: #666;
            font-size: 14px;
        }
        
        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        /* File Upload */
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-label {
            display: block;
            padding: 12px 15px;
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
        }
        
        .file-upload-label:hover {
            background: #e9ecef;
        }
        
        .file-upload-label i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .form-card {
                padding: 30px 20px;
            }
            
            .form-card h3 {
                font-size: 22px;
            }
            
            .btn-primary {
                padding: 14px 0;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="bg-element circle-1"></div>
    <div class="bg-element circle-2"></div>
    <div class="bg-element triangle"></div>

    <!-- Form Container -->
    <div class="form-card">
        <h3><i class="fas fa-file-alt me-2"></i>Form Pengajuan Mahasiswa</h3>
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="nama_pelapor" class="form-label">
                    <i class="fas fa-user"></i>Nama Lengkap
                </label>
                <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            
            <div class="form-group">
                <label for="nim_nidn" class="form-label">
                    <i class="fas fa-id-card"></i>NIM/NIDN
                </label>
                <input type="text" class="form-control" id="nim_nidn" name="nim_nidn" placeholder="Masukkan NIM atau NIDN Anda" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i>Email Aktif
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
            </div>
            
            <div class="form-group">
                <label for="telepon" class="form-label">
                    <i class="fas fa-phone"></i>No. Telepon
                </label>
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Contoh: 081234567890" required>
            </div>
            
            <div class="form-group">
                <label for="jenis_kekerasan" class="form-label">
                    <i class="fas fa-exclamation-triangle"></i>Jenis Kekerasan
                </label>
                <select class="form-select" id="jenis_kekerasan" name="jenis_kekerasan" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="fisik">Fisik</option>
                    <option value="psikis">Psikis</option>
                    <option value="seksual">Seksual</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="deskripsi" class="form-label">
                    <i class="fas fa-file-alt"></i>Deskripsi Kejadian
                </label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Jelaskan secara rinci kejadian yang Anda alami atau saksikan..." required></textarea>
            </div>
            
            <div class="form-group">
                <label for="tanggal_kejadian" class="form-label">
                    <i class="fas fa-calendar"></i>Tanggal Kejadian
                </label>
                <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" required>
            </div>
            
            <div class="form-group">
                <label for="lokasi_kejadian" class="form-label">
                    <i class="fas fa-map-marker-alt"></i>Lokasi Kejadian
                </label>
                <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian" placeholder="Contoh: Gedung A, Ruang 101" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-paperclip"></i>Upload Bukti (opsional)
                </label>
                <div class="file-upload">
                    <label for="bukti" class="file-upload-label">
                        <i class="fas fa-cloud-upload-alt"></i>Pilih file atau tarik ke sini
                    </label>
                    <input type="file" id="bukti" name="bukti" accept="image/*,application/pdf">
                </div>
                <small class="text-muted form-text d-block mt-2">Format yang didukung: gambar (JPG, PNG) atau PDF. Maks. 5MB</small>
            </div>
            
            <button type="submit" class="w-100 btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i>Kirim Pengajuan
            </button>
            
            <div class="form-footer">
                Data Anda dilindungi kerahasiaannya. <a href="#"><i class="fas fa-shield-alt me-1"></i>Kebijakan Privasi</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi untuk elemen form
            const formCard = document.querySelector('.form-card');
            formCard.style.opacity = '0';
            formCard.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                formCard.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                formCard.style.opacity = '1';
                formCard.style.transform = 'translateY(0)';
            }, 200);
            
            // Efek untuk file upload
            const fileInput = document.getElementById('bukti');
            const fileLabel = document.querySelector('.file-upload-label');
            
            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileLabel.innerHTML = `<i class="fas fa-file"></i> ${this.files[0].name}`;
                    fileLabel.style.background = '#e6f7ff';
                    fileLabel.style.borderColor = '#3498db';
                } else {
                    fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> Pilih file atau tarik ke sini`;
                    fileLabel.style.background = '#f8f9fa';
                    fileLabel.style.borderColor = '#e0e0e0';
                }
            });
        });
    </script>
</body>
</html>