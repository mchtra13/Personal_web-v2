<?php
require_once 'config/db.php';
$data = $db->query("SELECT * FROM about ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Saya - Personal Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Personal Web</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link active" href="about.php">Tentang</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2>Tentang Saya</h2>
  <div class="card shadow-sm p-4">
    <p><?= nl2br(htmlspecialchars($data['content'] ?? 'Belum ada informasi.')) ?></p>
  </div>
</div>
</body>
</html>
