<?php
require_once 'config/db.php';
require_once 'config/session.php';
requireLogin();

$artikel = $db->query("SELECT COUNT(*) as total FROM articles")->fetch_assoc()['total'];
$gambar = $db->query("SELECT COUNT(*) as total FROM gallery")->fetch_assoc()['total'];
$artikelList = $db->query("SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div>
      <a href="logout.php" class="btn btn-light">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h4>Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?></h4>

    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="card bg-info text-white card-info">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Artikel</h5>
                    <h2><?= $artikel ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card bg-success text-white card-info">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Gambar</h5>
                    <h2><?= $gambar ?></h2>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="mb-3">
        <a href="admin/artikel_add.php" class="btn btn-outline-primary me-2">Tambah Artikel</a>
        <a href="admin/gallery_add.php" class="btn btn-outline-success me-2">Tambah Gambar</a>
        <a href="admin/about_manage.php" class="btn btn-outline-secondary">Kelola About</a>
    </div>

    <h5 class="mt-4">Daftar Artikel Terbaru</h5>
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = $artikelList->fetch_assoc()):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <a href="admin/artikel_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="admin/artikel_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
