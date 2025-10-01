<?php
session_start();
include 'koneksi.php';

// Validasi method request
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: registrasi.php");
    exit;
}

// Validasi input
$required_fields = ['nama', 'email', 'password', 'confirm_password'];
foreach($required_fields as $field) {
    if(empty($_POST[$field])) {
        header("Location: registrasi.php?error=Semua field harus diisi");
        exit;
    }
}

$nama = trim($_POST['nama']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi format email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: registrasi.php?error=Format email tidak valid");
    exit;
}

// Validasi kesamaan password
if($password !== $confirm_password) {
    header("Location: registrasi.php?error=Konfirmasi password tidak sama");
    exit;
}

// Validasi kekuatan password
if(strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
    header("Location: registrasi.php?error=Password harus minimal 8 karakter mengandung huruf kapital dan angka");
    exit;
}

// Cek duplikasi email
$check_email = $koneksi->prepare("SELECT id FROM users WHERE email = ?");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();

if($check_email->num_rows > 0) {
    header("Location: registrasi.php?error=Email sudah terdaftar");
    exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan data ke database
try {
    $stmt = $koneksi->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $hashed_password);
    
    if($stmt->execute()) {
        header("Location: registrasi.php?success=Registrasi berhasil! Silahkan login.");
        exit;
    } else {
        throw new Exception("Gagal menyimpan data");
    }
} catch(Exception $e) {
    error_log("Registration error: " . $e->getMessage());
    header("Location: registrasi.php?error=Gagal melakukan registrasi");
    exit;
}
?>