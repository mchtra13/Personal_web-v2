<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $db->real_escape_string($_POST['title']);
    $file = $_FILES['image'];

    if ($file['error'] === 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $name = time() . '.' . $ext;
        move_uploaded_file($file['tmp_name'], "../uploads/" . $name);
        $db->query("INSERT INTO gallery (title, filename) VALUES ('$title', '$name')");
        $msg = "Gambar berhasil diunggah!";
    } else {
        $msg = "Gagal mengunggah gambar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Tambah Gambar ke Galeri</h3>
    <?php if ($msg): ?><div class="alert alert-info"><?= $msg ?></div><?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="form-control mb-3" placeholder="Judul Gambar" required>
        <input type="file" name="image" class="form-control mb-3" accept="image/*" required>
        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
