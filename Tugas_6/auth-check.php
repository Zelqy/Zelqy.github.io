<?php
// auth-check.php - File untuk mengecek status login

// Pastikan session sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Halaman yang diizinkan tanpa login
$allowed_pages = ['login.php', 'logout.php', 'auth-check.php'];
$current_page = basename($_SERVER['PHP_SELF']);

// Jika belum login dan bukan halaman yang diizinkan, redirect ke login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (!in_array($current_page, $allowed_pages)) {
        header("Location: login.php");
        exit();
    }
}
?>