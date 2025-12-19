<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head><title>Tambah Mahasiswa</title></head>
<body>
<h2>Tambah Data Mahasiswa</h2>

<form method="post" action="">
    NIM: <input type="text" name="nim" required><br><br>
    Nama: <input type="text" name="nama" required><br><br>
    Prodi: <input type="text" name="prodi" required><br><br>
    Semester: <input type="text" name="semester" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php" style="margin-left: 10px;">Kembali</a>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];

    // Pastikan hanya 4 kolom sesuai struktur baru
    $query = "INSERT INTO mahasiswa (nim, nama, prodi, semester) VALUES('$nim','$nama','$prodi','$semester')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

</body>
</html>