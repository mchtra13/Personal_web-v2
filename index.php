<?php
require_once 'config/db.php';
$articles = $db->query("SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda - Personal Web</title>
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
        <li class="nav-item"><a class="nav-link" href="about.php">Tentang</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2>Artikel Terbaru</h2>
  <div class="row">
    <?php while($row = $articles->fetch_assoc()): ?>
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
            <p class="card-text"><?= substr(strip_tags($row['content']), 0, 100) ?>...</p>
            <small class="text-muted">Diposting: <?= $row['created_at'] ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>
