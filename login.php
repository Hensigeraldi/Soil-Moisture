<?php
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color:rgb(249, 249, 252);
            --secondary-color:rgb(249, 249, 252);
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .bubble {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite;
            opacity: 0.5;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) scale(0.5);
                opacity: 0;
            }
            100% {
                transform: translateY(-100vh) scale(1);
                opacity: 0.5;
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .hover-scale {
            transition: transform 0.3s;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .social-section {
            background: rgba(255, 255, 255, 0.9);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
        }

        .social-btn {
            transition: all 0.3s;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-google {
            background: #db4437;
            color: white;
        }

        .btn-facebook {
            background: #1877f2;
            color: white;
        }

        .btn-tiktok {
            background: #000;
            color: white;
        }

        .btn-instagram {
            background: linear-gradient(45deg, #405de6, #833ab4, #c13584, #e1306c);
            color: white;
        }
    </style>
</head>
<body>
    <div class="bubbles" id="bubbles"></div>

    <div class="container">
        <div class="glass-card p-0 hover-scale" style="max-width: 1000px; margin: 0 auto;">
            <div class="row g-0">
                <!-- Login Form -->
                <div class="col-md-6 p-5">
                    <h1 class="text-center mb-5 fw-bold text-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Login Akun
                    </h1>
                    
                    <?php if(isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
                    <?php endif; ?>
                    
                    <form action="proses_login.php" method="POST">
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Social Login Section -->
                <div class="col-md-6 social-section">
                    <div class="text-center mb-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/3143/3143473.png" 
                             alt="Login Illustration" 
                             class="img-fluid mb-4"
                             style="max-height: 200px;">
                        <h3 class="fw-bold mb-4">Login dengan Media Sosial</h3>
                        
                        <div class="d-grid gap-3">
                            <button class="btn btn-google btn-lg social-btn">
                                <i class="fab fa-google"></i>
                                Google
                            </button>
                            
                            <button class="btn btn-facebook btn-lg social-btn">
                                <i class="fab fa-facebook"></i>
                                Facebook
                            </button>
                            
                            <button class="btn btn-tiktok btn-lg social-btn">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </button>
                            
                            <button class="btn btn-instagram btn-lg social-btn">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </button>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted">Belum punya akun? 
                            <a href="registrasi.php" class="text-primary fw-bold">Daftar disini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generate animated bubbles
        function createBubbles() {
            const bubblesContainer = document.getElementById('bubbles');
            for(let i = 0; i < 20; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';
                
                // Random size between 10px and 50px
                const size = Math.random() * 40 + 10;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;
                
                // Random position
                bubble.style.left = `${Math.random() * 100}%`;
                bubble.style.animationDelay = `${Math.random() * 10}s`;
                
                bubblesContainer.appendChild(bubble);
            }
        }

        createBubbles();
    </script>
</body>
</html>