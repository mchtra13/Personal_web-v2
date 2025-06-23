<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$id = $_GET['id'] ?? 0;
$data = $db->query("SELECT * FROM gallery WHERE id = $id")->fetch_assoc();

if (!$data) die("Data tidak ditemukan.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $db->real_escape_string($_POST['title']);
    $filename = $data['filename'];

    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newName = time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $newName);
        unlink("../uploads/" . $filename);
        $filename = $newName;
    }

    $db->query("UPDATE gallery SET title='$title', filename='$filename' WHERE id=$id");
    header("Location: ../dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Edit Gambar Galeri</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" class="form-control mb-3" required>
        <img src="../uploads/<?= $data['filename'] ?>" class="img-thumbnail mb-3" width="200">
        <input type="file" name="image" class="form-control mb-3" accept="image/*">
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
