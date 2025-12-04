<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f4f7;
        }
        .container {
            margin-top: 40px;
        }
        .table img {
            border-radius: 8px;
            object-fit: cover;
        }
        .header-title {
            font-weight: bold;
            font-size: 28px;
        }
        .card {
            border-radius: 15px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="header-title">📘 Data Mahasiswa</h2>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>Gambar</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['prodi']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td>
                    <img src="img/<?= $row['gambar']; ?>" width="70" height="70">
                </td>
                <td>
                    <a href="edit.php?nim=<?= $row['nim']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus.php?nim=<?= $row['nim']; ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>
