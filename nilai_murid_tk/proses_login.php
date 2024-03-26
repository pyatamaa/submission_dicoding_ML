<?php
session_start();

// Membutuhkan file config.php
require_once "config.php";

// Menerima data login
$username = $_POST['username'];
$password = $_POST['password'];

// Memverifikasi kredensial
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Memulai sesi
    $_SESSION['user'] = $username;

    // Mengarahkan ke dashboard
    header("Location: dashboard.php");
} else {
    // Pesan error
    echo "<p class='alert alert-danger'>Login gagal! Username atau password salah.</p>";
}
?>
