<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $db->real_escape_string($_POST['title']);
    $content = $db->real_escape_string($_POST['content']);

    $db->query("INSERT INTO articles (title, content) VALUES ('$title', '$content')");
    $msg = "Artikel berhasil ditambahkan.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Tambah Artikel</h3>
    <?php if ($msg): ?>
        <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="title" class="form-control mb-3" placeholder="Judul Artikel" required>
        <textarea name="content" class="form-control mb-3" rows="6" placeholder="Isi Artikel" required></textarea>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
