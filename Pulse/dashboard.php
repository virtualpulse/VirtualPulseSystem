<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: index.html");
    exit;
}

define('DASHBOARD_ACCESS', true);

include 'dashboard_content.php';
?>
