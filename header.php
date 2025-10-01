<?php
session_start();
// Jika tidak ada session user, redirect ke login
if(!isset($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAW Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #2A2F4F;
            --secondary-color: #917FB3;
            --accent-color: #E5BEEC;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
        }
        /* Typing Animation */
        .typed-text {
            border-right: 2px solid #2A2F4F;
            padding-right: 5px;
        }

        .typed-cursor {
            font-size: 1.25rem;
            color: #2A2F4F;
            animation: blink 0.7s infinite;
            vertical-align: baseline;
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
}
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark gradient-bg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="home.php">
            <i class="fas fa-graduation-cap me-2"></i>Beasiswa SAW
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input.php"><i class="fas fa-pen-to-square"></i> Input Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil.php"><i class="fas fa-chart-simple"></i> Hasil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <?= $_SESSION['user']['nama'] ?? 'User' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
            </ul>
        </div>
    </div>
</nav>
<main class="container pt-5 mt-5">