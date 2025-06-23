<?php
require_once 'config/db.php';
require_once 'config/session.php';

if (isLogged()) {
    header("Location: dashboard.php");
    exit;
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $db->real_escape_string($_POST['username']);
    $pass = $_POST['password'];

    $q = $db->query("SELECT * FROM admins WHERE username = '$user' LIMIT 1");
    if ($q && $q->num_rows > 0) {
        $row = $q->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['admin'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "Password salah!";
        }
    } else {
        $msg = "Akun tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="login-box">
        <h3 class="text-center">Login Admin</h3>
        <?php if ($msg): ?>
            <div class="alert alert-danger"><?= $msg ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
