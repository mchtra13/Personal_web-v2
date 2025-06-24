<?php
session_start();

// Anti DDoS: batasi 60 request per menit per IP
$ip = $_SERVER['REMOTE_ADDR'];
$limit = 60;
$time = time();

if (!isset($_SESSION['traffic'])) $_SESSION['traffic'] = [];
if (!isset($_SESSION['traffic'][$ip])) {
    $_SESSION['traffic'][$ip] = ['count' => 1, 'time' => $time];
} else {
    if ($time - $_SESSION['traffic'][$ip]['time'] <= 60) {
        $_SESSION['traffic'][$ip]['count']++;
        if ($_SESSION['traffic'][$ip]['count'] > $limit) {
            http_response_code(429);
            die("Terlalu banyak permintaan dari IP ini.");
        }
    } else {
        $_SESSION['traffic'][$ip] = ['count' => 1, 'time' => $time];
    }
}
?>
