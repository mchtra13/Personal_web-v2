<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/functions.php';

session_start();
if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts'] = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['login_attempts'] >= 5) {
        die("Terlalu banyak percobaan login. Coba lagi nanti.");
    }

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['username'];
        $_SESSION['login_attempts'] = 0;
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['login_attempts']++;
        echo "Login gagal!";
    }
}
?>
