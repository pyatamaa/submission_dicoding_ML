<?php
session_start();

// Include file function
require_once "function.php";

// Cek apakah user sudah login
if (is_logged_in()) {
  // Redirect ke halaman dashboard
  header("Location: dashboard.php");
  exit;
}

// Tampilkan form login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Nilai Murid TK - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhckVAQ33B5d5bAv5/iy6+9W1Q9Y7bYMX0lETAy2cFA7zXqE1029c6kH17sQf" crossorigin="anonymous">
</head>
<body>
  <header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between">
      <h1>Sistem Pengelolaan Nilai Murid TK</h1>
    </div>
  </header>

  <main class="container mt-5">
    <h2>Login</h2>

    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </main>

  <footer class="text-center py-3 bg-light">
    <div class="container">
      <p>Copyright &copy; <?php echo date("Y"); ?></p>
    </div>
  </footer>

</body>
</html>

<?php

// Proses login
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  login_user($username, $password);
}

?>
