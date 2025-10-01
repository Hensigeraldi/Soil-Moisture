<?php
session_start();
include 'koneksi.php';

// Redirect jika sudah login
if(isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        .hover-scale {
            transition: transform 0.3s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Notifikasi Error/Success -->
        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Registrasi berhasil! Silahkan login menggunakan akun yang telah dibuat.
            </div>
        <?php endif; ?>

        <div class="glass-card p-5 hover-scale" style="max-width: 600px; margin: 0 auto;">
            <h1 class="text-center mb-5 fw-bold text-primary">
                <i class="fas fa-user-plus me-2"></i>Registrasi Akun
            </h1>

        <form action="proses_registrasi.php" method="POST">
              <div class="mb-4">
                    <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
            
            <div class="mb-4">
                <label for="email" class="form-label fw-bold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-primary text-white">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label for="confirm_password" class="form-label fw-bold">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                </button>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted">Sudah punya akun? 
                    <a href="login.php" class="text-primary fw-bold">Login disini</a>
                </p>
            </div>
        </form>
    </div>
</div>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const passwordPattern = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        
        if (!passwordPattern.test(password)) {
            alert('Password harus mengandung minimal 1 huruf kapital dan 1 angka');
            e.preventDefault();
            return false;
        }
        
        if (password !== confirmPassword) {
            alert('Konfirmasi password tidak sama');
            e.preventDefault();
            return false;
        }
        
        return true;
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>