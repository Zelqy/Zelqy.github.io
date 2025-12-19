<?php
$koneksi = mysqli_connect("localhost", "root", "ZelqyAdrian", "stilo");

// Cek error
if (mysqli_connect_errno()) {
    die("Koneksi MariaDB gagal: " . mysqli_connect_error());
}
?>

