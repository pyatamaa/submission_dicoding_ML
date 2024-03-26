<?php
session_start();

// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Arahkan ke halaman login
header("Location: ../login.php");
exit;
?>
