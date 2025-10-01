<?php
$host = "db-beasiswa";
$user = "root";
$pass = "root";
$db   = "saw_beasiswa";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Set charset ke utf8
$koneksi->set_charset("utf8");
?>