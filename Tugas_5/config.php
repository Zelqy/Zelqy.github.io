<?php
$koneksi = mysqli_connect("localhost", "root", "ZelqyAdrian", "stilo");

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
