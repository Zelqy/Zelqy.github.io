<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sika2";
$port = 3306;

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);
?>