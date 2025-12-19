<?php 
require_once "auth-check.php";
include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head><title>Tambah Mahasiswa</title></head>
<body>
<h2>Tambah Data Mahasiswa</h2>

<form method="post" enctype="multipart/form-data">
    NIM: <input type="text" name="nim"><br><br>
    Nama: <input type="text" name="nama"><br><br>
    Prodi: <input type="text" name="prodi"><br><br>
    Alamat: <textarea name="alamat"></textarea><br><br>
    Gambar: <input type="file" name="gambar"><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "img/" . $gambar);

    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('$nim','$nama','$prodi','$alamat','$gambar')");

    echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
}
?>

</body>
</html>