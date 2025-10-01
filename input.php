<?php
include 'koneksi.php';

// PROSES TAMBAH DATA
if (isset($_POST['tambah'])) {
    $nim = $koneksi->real_escape_string($_POST['nim']);
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $ipk = floatval($_POST['ipk']);
    $ekonomi = intval($_POST['ekonomi']);
    $ekstrakurikuler = intval($_POST['ekstrakurikuler']);

    // Validasi IPK
    if ($ipk < 0 || $ipk > 4) {
        echo "<script>alert('IPK harus antara 0-4!');</script>";
    } else {
        // Cek apakah NIM sudah ada
        $cek = $koneksi->query("SELECT nim FROM mahasiswa WHERE nim = '$nim'");
        if ($cek->num_rows > 0) {
            echo "<script>alert('NIM sudah terdaftar! Gunakan NIM lain.');</script>";
        } else {
            // Simpan data
            $query = "INSERT INTO mahasiswa (nim, nama, ipk, ekonomi, ekstrakurikuler) 
                      VALUES ('$nim', '$nama', $ipk, $ekonomi, $ekstrakurikuler)";

            if ($koneksi->query($query)) {
                echo "<script>alert('Data berhasil ditambahkan!');</script>";
            } else {
                echo "<script>alert('Gagal menambahkan data: " . $koneksi->error . "');</script>";
            }
        }
    }
}

include 'header.php';
?>


<div class="glass-card p-4 mb-5 hover-scale">
    <h2 class="text-center mb-4 fw-bold text-primary">
        <i class="fas fa-pen-to-square me-2"></i>Form Input Data
    </h2>
    
    <form method="POST" class="row g-4">
        <div class="col-md-6">
            <label class="form-label fw-bold">NIM Mahasiswa</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <label class="form-label fw-bold">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">IPK Terakhir</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-star"></i></span>
                <input type="number" name="ipk" step="0.01" min="0" max="4" 
                       class="form-control" placeholder="0.00 - 4.00" required>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Skor Ekonomi</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-scale-balanced"></i></span>
                <select class="form-select" name="ekonomi" required>
                    <option value="">Pilih Skor</option>
                    <option value="1">1 (Sangat Mampu)</option>
                    <option value="2">2 (Mampu)</option>
                    <option value="3">3 (Cukup)</option>
                    <option value="4">4 (Kurang)</option>
                    <option value="5">5 (Sangat Kurang)</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Skor Ekstrakurikuler</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-people-group"></i></span>
                <select class="form-select" name="ekstrakurikuler" required>
                    <option value="">Pilih Skor</option>
                    <option value="1">1 (Minim)</option>
                    <option value="2">2 (Cukup)</option>
                    <option value="3">3 (Aktif)</option>
                    <option value="4">4 (Sangat Aktif)</option>
                    <option value="5">5 (Luarbiasa)</option>
                </select>
            </div>
        </div>

        <div class="col-12 text-center">
            <button type="submit" name="tambah" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-save me-2"></i>Simpan Data
            </button>
        </div>
    </form>
</div>

<?php 
include 'footer.php';
?>