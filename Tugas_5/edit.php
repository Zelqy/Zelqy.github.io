<?php 
include "koneksi.php";

$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head><title>Edit Mahasiswa</title></head>
<body>

<h2>Edit Mahasiswa</h2>

<form method="post" enctype="multipart/form-data">
    Nama: <input type="text" name="nama" value="<?= $row['nama']; ?>"><br><br>
    Prodi: <input type="text" name="prodi" value="<?= $row['prodi']; ?>"><br><br>
    Alamat: <textarea name="alamat"><?= $row['alamat']; ?></textarea><br><br>
    Gambar baru (opsional): <input type="file" name="gambar"><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "img/" . $gambar);
    } else {
        $gambar = $row['gambar'];
    }

    mysqli_query($koneksi, 
        "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', alamat='$alamat', gambar='$gambar' WHERE nim='$nim'"
    );

    echo "<script>alert('Data diupdate'); window.location='index.php';</script>";
}
?>

</body>
</html>
