<?php
// Start session (ONLY ONCE)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// User session
$_user = $_SESSION['user'] ?? null;

// Helper: check POST
function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Helper: redirect
function redirect($url) {
    header("Location: $url");
    exit();
}

// Protect page (login required)
function auth_user() {
    if (empty($_SESSION['user'])) {
        redirect('/login.php');
    }
}

// Admin only
function auth_admin() {
    if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'Admin') {
        redirect('/login.php');
    }
}
?>
