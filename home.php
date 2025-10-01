<?php
include 'header.php'; ?>

<style>
    /* Animasi Bubble */
    .bubbles {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        z-index: 0;
    }
    
    .bubble {
        position: absolute;
        background: #333;
        border-radius: 50%;
        animation: float 15s infinite linear;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        opacity: 0.8;
        z-index: 1;
    }

    @keyframes float {
        0% {
            transform: translateY(100vh) scale(0.5);
            opacity: 0.8;
        }
        100% {
            transform: translateY(-20vh) scale(1.2);
            opacity: 0;
        }
    }

    .bubble:nth-child(odd) {
        background: #444;
    }

    /* Animasi Pesawat */
    .airplane {
        position: absolute;
        font-size: 40px;
        animation: fly 15s linear infinite;
        opacity: 0.3;
        z-index: 0;
        pointer-events: none;
    }

    @keyframes fly {
        0% {
            transform: translateX(-100%) rotate(0deg);
        }
        100% {
            transform: translateX(200vw) rotate(5deg);
        }
    }

    .airplane.reverse {
        animation: flyReverse 18s linear infinite;
    }

    @keyframes flyReverse {
        0% {
            transform: translateX(200vw) rotateY(180deg);
        }
        100% {
            transform: translateX(-100%) rotateY(180deg);
        }
    }

    /* Styling Konten */
    .glass-card {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.95) !important;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .hover-scale:hover {
        transform: scale(1.02);
    }

    .floating-animation {
        animation: float-img 3s ease-in-out infinite;
    }

    @keyframes float-img {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
</style>

<div class="bubbles" id="bubbles"></div>

<!-- Konten Utama -->
<div class="glass-card p-4 mb-5 hover-scale">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-4 text-primary animate__animated animate__fadeInDown">
                Selamat Datang di Sistem Seleksi Beasiswa
            </h1>
            <p class="lead mb-4 animate__animated animate__fadeInLeft">
                <span id="typing-text" class="typed-text"></span>
                <span class="typed-cursor">|</span>
            </p>
            <a href="input.php" class="btn btn-primary btn-lg px-5 animate__animated animate__zoomIn">
                <i class="fas fa-rocket me-2"></i>Mulai Sekarang
            </a>
        </div>
        <div class="col-md-6 text-center animate__animated animate__fadeInRight">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRDfmcAtEGIQZxY3DECRkUdzgbPfvwUGXd6w&s" 
                 alt="Ilustrasi" 
                 class="img-fluid floating-animation"
                 style="max-height: 400px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1))">
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

<script>
    function createElement() {
        const container = document.getElementById('bubbles');
        
        // 30% chance membuat pesawat
        if(Math.random() < 0.3) {
            const airplane = document.createElement('div');
            airplane.className = 'airplane';
            airplane.innerHTML = '✈️';
            
            // Random position
            airplane.style.top = Math.random() * 100 + '%';
            
            // Random direction
            if(Math.random() < 0.5) {
                airplane.classList.add('reverse');
            }
            
            // Random speed
            const speed = Math.random() * 10 + 15;
            airplane.style.animationDuration = speed + 's';
            
            container.appendChild(airplane);
            
            setTimeout(() => {
                airplane.remove();
            }, speed * 1000);
            
        } else {
            // Create bubble
            const bubble = document.createElement('div');
            bubble.className = 'bubble';
            
            const size = Math.random() * 70 + 30;
            bubble.style.width = size + 'px';
            bubble.style.height = size + 'px';
            bubble.style.left = Math.random() * 100 + '%';
            
            const duration = Math.random() * 10 + 5;
            bubble.style.animationDuration = duration + 's';
            bubble.style.animationDelay = Math.random() * 5 + 's';
            
            container.appendChild(bubble);
            
            setTimeout(() => {
                bubble.remove();
            }, duration * 1000);
        }
    }

    // Membuat element setiap 500ms
    setInterval(createElement, 500);

    // Animasi hover card
    document.querySelectorAll('.hover-scale').forEach(card => {
        card.addEventListener('mouseover', () => {
            card.style.transform = 'scale(1.02)';
        });
        card.addEventListener('mouseout', () => {
            card.style.transform = 'scale(1)';
        });
    });
</script>

<?php include 'footer.php'; ?>