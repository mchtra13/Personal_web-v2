<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireLogin();

$id = $_GET['id'] ?? 0;
$db->query("DELETE FROM articles WHERE id = $id");
header("Location: ../dashboard.php");
