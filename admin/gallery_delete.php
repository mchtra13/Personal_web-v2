<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$id = $_GET['id'] ?? 0;
$data = $db->query("SELECT * FROM gallery WHERE id = $id")->fetch_assoc();
if ($data) {
    unlink("../uploads/" . $data['filename']);
    $db->query("DELETE FROM gallery WHERE id = $id");
}
header("Location: ../dashboard.php");
