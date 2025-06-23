<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$id = $_GET['id'] ?? 0;
$artikel = $db->query("SELECT * FROM articles WHERE id = $id")->fetch_assoc();

if (!$artikel) die("Artikel tidak ditemukan!");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $db->real_escape_string($_POST['title']);
    $content = $db->real_escape_string($_POST['content']);
    $db->query("UPDATE articles SET title='$title', content='$content' WHERE id=$id");
    header("Location: ../dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Edit Artikel</h3>
    <form method="post">
        <input type="text" name="title" class="form-control mb-3" value="<?= htmlspecialchars($artikel['title']) ?>" required>
        <textarea name="content" class="form-control mb-3" rows="6" required><?= htmlspecialchars($artikel['content']) ?></textarea>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
