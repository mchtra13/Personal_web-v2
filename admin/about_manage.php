<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$data = $db->query("SELECT * FROM about ORDER BY id DESC LIMIT 1")->fetch_assoc();
$content = $data['content'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $db->real_escape_string($_POST['content']);
    if ($data) {
        $db->query("UPDATE about SET content='$text' WHERE id = " . $data['id']);
    } else {
        $db->query("INSERT INTO about (content) VALUES ('$text')");
    }
    $content = $text;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Kelola Tentang Saya</h3>
    <form method="post">
        <textarea name="content" rows="8" class="form-control mb-3" required><?= htmlspecialchars($content) ?></textarea>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
