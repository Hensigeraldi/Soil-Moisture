<?php include 'header.php'; ?>

<div class="glass-card p-4 mb-5 hover-scale">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-4 text-primary">
                Selamat Datang di Sistem Seleksi Beasiswa
            </h1>
            <p class="lead mb-4">
                Temukan penerima beasiswa terbaik menggunakan metode SAW (Simple Additive Weighting) 
                dengan analisis yang komprehensif dan akurat.
            </p>
            <a href="input.php" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-rocket me-2"></i>Mulai Sekarang
            </a>
        </div>
        <div class="col-md-6 text-center">
            <img src="assets/illustration.png" alt="Ilustrasi" class="img-fluid" style="max-height: 400px;">
        </div>
    </div>
</div>

<div class="glass-card p-4 mb-5 hover-scale">
    <h2 class="text-center mb-5 fw-bold text-primary">
        <i class="fas fa-chart-line me-2"></i>Proses Seleksi
    </h2>
    
    <div class="row g-4 text-center">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="icon-circle bg-primary mb-3">
                        <i class="fas fa-upload fa-2x text-white"></i>
                    </div>
                    <h5>Input Data</h5>
                    <p class="text-muted">Masukkan data calon penerima beasiswa</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="icon-circle bg-info mb-3">
                        <i class="fas fa-calculator fa-2x text-white"></i>
                    </div>
                    <h5>Proses SAW</h5>
                    <p class="text-muted">Sistem melakukan perhitungan metode SAW</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="icon-circle bg-success mb-3">
                        <i class="fas fa-chart-pie fa-2x text-white"></i>
                    </div>
                    <h5>Analisis Data</h5>
                    <p class="text-muted">Visualisasi hasil perhitungan</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="icon-circle bg-warning mb-3">
                        <i class="fas fa-award fa-2x text-white"></i>
                    </div>
                    <h5>Hasil Akhir</h5>
                    <p class="text-muted">Pengumuman penerima beasiswa</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>