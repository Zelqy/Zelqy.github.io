<?php

// Proteksi halaman (kecuali login.php)
$allowed_pages = ['login.php', 'logout.php'];
$current_page = basename($_SERVER['PHP_SELF']);

// Jika belum login dan bukan halaman yang diizinkan, redirect ke login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (!in_array($current_page, $allowed_pages)) {
        header("Location: login.php");
        exit();
    }
}

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sika";
$port = 3306;

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>