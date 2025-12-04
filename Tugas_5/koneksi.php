<?php
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "sika";
$port = 3306; // kalau Herd pakai port 3307, ganti di sini

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

// Cek error
if (mysqli_connect_errno()) {
    die("Koneksi MariaDB gagal: " . mysqli_connect_error());
}
?>
