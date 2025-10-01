</main>
<footer class="gradient-bg text-white mt-5">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-info-circle me-2"></i>Tentang</h5>
                <p>Sistem seleksi beasiswa menggunakan metode SAW dengan implementasi modern dan user-friendly interface.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-link me-2"></i>Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="home.php" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="input.php" class="text-white text-decoration-none">Input Data</a></li>
                    <li><a href="hasil.php" class="text-white text-decoration-none">Hasil Seleksi</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-envelope me-2"></i>Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone me-2"></i>+62 123 4567 890</li>
                    <li><i class="fas fa-envelope me-2"></i>info@beasiswasaw.ac.id</li>
                </ul>
            </div>
        </div>
        <div class="text-center pt-3 border-top mt-4">
            <p class="mb-0">&copy; 2024 Beasiswa SAW. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Typing Animation untuk subtitle
    const text = "Temukan penerima beasiswa terbaik menggunakan metode SAW (Simple Additive Weighting) dengan analisis yang komprehensif dan akurat.";
    const typingElement = document.getElementById('typing-text');
    const cursor = document.querySelector('.typed-cursor');
    
    let charIndex = 0;
    
    function typeWriter() {
        if(charIndex < text.length) {
            typingElement.innerHTML += text.charAt(charIndex);
            charIndex++;
            setTimeout(typeWriter, 30); // Kecepatan ketik (ms per karakter)
        } else {
            cursor.style.animation = 'none';
            cursor.style.opacity = '0';
        }
    }
    
    // Jalankan animasi setelah halaman dimuat
    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(typeWriter, 500); // Jeda awal sebelum mulai mengetik
    });
</script>
</body>
</html>