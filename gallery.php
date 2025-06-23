<?php
require_once 'config/db.php';
$galeri = $db->query("SELECT * FROM gallery ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri - Personal Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .galeri-img {
      object-fit: cover;
      width: 100%;
      height: 200px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Personal Web</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link active" href="gallery.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">Tentang</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2>Galeri Karya</h2>
  <div class="row">
    <?php while ($row = $galeri->fetch_assoc()): ?>
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="card shadow-sm">
          <img src="uploads/<?= htmlspecialchars($row['filename']) ?>" class="galeri-img" alt="<?= htmlspecialchars($row['title']) ?>">
          <div class="card-body">
            <h6 class="card-title"><?= htmlspecialchars($row['title']) ?></h6>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>
