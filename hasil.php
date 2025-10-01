<?php

include 'koneksi.php';


if(isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    
    if($koneksi->query($query)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href='hasil.php';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal menghapus data: ".$koneksi->error."');</script>";
    }
}


// ============================ 
// BAGIAN PERHITUNGAN METODE SAW 
// ============================

// 1. Ambil bobot kriteria dari database
$kriteria = $koneksi->query("SELECT * FROM `kriteria`");
$bobot = [];
while($row = $kriteria->fetch_assoc()) {
    $bobot[$row['nama_kriteria']] = $row; // Simpan ke array bobot
}

// 2. Ambil data mahasiswa dari database
$mahasiswa = $koneksi->query("SELECT * FROM mahasiswa");
$hasilSAW = [];

// 3. Proses perhitungan SAW jika ada data
if ($mahasiswa->num_rows > 0) {
    // 4. Cari nilai maksimal/minimal tiap kriteria
    $maxC1 = $koneksi->query("SELECT MAX(ipk) AS max FROM mahasiswa")->fetch_assoc()['max'];
    $minC2 = $koneksi->query("SELECT MIN(ekonomi) AS min FROM mahasiswa")->fetch_assoc()['min'];
    $maxC3 = $koneksi->query("SELECT MAX(ekstrakurikuler) AS max FROM mahasiswa")->fetch_assoc()['max'];

    // 5. Normalisasi dan hitung nilai akhir
    while($row = $mahasiswa->fetch_assoc()) {
        // Normalisasi
        $normC1 = $row['ipk'] / $maxC1; // Benefit (Semakin besar越好)
        $normC2 = $minC2 / $row['ekonomi']; // Cost (Semakin kecil越好)
        $normC3 = $row['ekstrakurikuler'] / $maxC3; // Benefit
        
        // Hitung total nilai dengan bobot
        $total = ($normC1 * $bobot['IPK']['bobot']) + 
                ($normC2 * $bobot['Kondisi Ekonomi']['bobot']) + 
                ($normC3 * $bobot['Aktivitas Ekstrakurikuler']['bobot']);
        
        // Simpan hasil
        $hasilSAW[] = [
            'id' => $row['id'],
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'total' => $total
        ];
    }
    
    // 6. Urutkan berdasarkan nilai tertinggi
    usort($hasilSAW, function($a, $b) {
        return $b['total'] <=> $a['total']; // Descending
    });
}

include 'header.php'; 
?>

<div class="glass-card p-4 mb-5 hover-scale">
    <h2 class="text-center mb-4 fw-bold text-primary">
        <i class="fas fa-trophy me-2"></i>Hasil Seleksi Beasiswa
    </h2>

    <div class="row g-4">
        <?php foreach($hasilSAW as $index => $row): ?>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="badge bg-primary rounded-pill fs-5">#<?= $index+1 ?></div>
                        <div class="badge bg-<?= ($index < 2) ? 'success' : 'danger' ?>">
                            <?= ($index < 2) ? 'Layak' : 'Tidak Layak' ?>
                        </div>
                        <a href="?hapus=<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm ms-2"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    
                    <div class="mt-3">
                        <h4 class="card-title mb-1"><?= $row['nama'] ?></h4>
                        <p class="text-muted mb-2">NIM: <?= $row['nim'] ?></p>
                        
                        <div class="progress mb-3" style="height: 25px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                 style="width: <?= $row['total'] * 100 ?>%" 
                                 aria-valuenow="<?= $row['total'] * 100 ?>" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                                <?= number_format($row['total'] * 100, 1) ?>%
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between text-center">
                            <div>
                                <small class="text-muted d-block">Nilai Akhir</small>
                                <span class="fw-bold fs-5"><?= number_format($row['total'], 3) ?></span>
                            </div>
                            <div>
                                <small class="text-muted d-block">Status</small>
                                <span class="badge bg-<?= ($index < 2) ? 'success' : 'danger' ?>">
                                    <?= ($index < 2) ? 'Diterima' : 'Ditolak' ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>