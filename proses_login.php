<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: home.php");
        exit;
    }
}

header("Location: login.php?error=Email atau password salah");
exit;
?>