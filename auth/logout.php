<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hapus cookie "remember_user"
if (isset($_COOKIE['remember_user'])) {
    $cookie_name = 'remember_user';
    setcookie($cookie_name, '', time() - 3600);
}

// Hapus semua session data
session_destroy();

// Redirect ke halaman login setelah logout
header('Location: login.php');
exit();
?>