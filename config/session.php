<?php
session_start();

function isLogged() {
    return isset($_SESSION['admin']);
}

function requireLogin() {
    if (!isLogged()) {
        header('Location: login.php');
        exit;
    }
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: login.php");
}
?>
