<?php
$db = new mysqli("localhost", "root", "", "personal_web");
if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}
?>
