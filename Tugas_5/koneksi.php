<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sika";
$port = 3306;

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
