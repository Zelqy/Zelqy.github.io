<?php 
include "koneksi.php";

$nim = $_GET['nim'] ?? '';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($data);

// Debug: Cek data yang diambil
if (!$row) {
    die("Data mahasiswa dengan NIM $nim tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 400px; }
        input, textarea { width: 100%; padding: 8px; margin: 5px 0; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<h2>Edit Mahasiswa</h2>

<form method="post" action="">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($row['nama'] ?? ''); ?>"><br><br>
    Prodi: <input type="text" name="prodi" value="<?= htmlspecialchars($row['prodi'] ?? ''); ?>"><br><br>
    Semester: <input type="text" name="semester" value="<?= htmlspecialchars($row['semester'] ?? ''); ?>"><br><br>
    
    <button type="submit" name="update">Update</button>
    <a href="index.php" style="margin-left: 10px;">Kembali</a>
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    
    // Debug: Tampilkan query sebelum eksekusi
    $query = "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', semester='$semester' WHERE nim='$nim'";
    echo "<!-- Query: $query -->";
    
    // Eksekusi query
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal update: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

</body>
</html>