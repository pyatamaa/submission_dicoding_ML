<?php

// Fungsi untuk menampilkan pesan error
function show_error($message) {
  echo "<div class='alert alert-danger'>$message</div>";
}

// Fungsi untuk login user
function login_user($username, $password) {
  global $conn;

  // Query untuk mendapatkan user dengan username dan password yang diinputkan
  $user_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $user_result = mysqli_query($conn, $user_query);

  // Cek apakah user ditemukan
  if (mysqli_num_rows($user_result) > 0) {
    // User ditemukan
    $user_data = mysqli_fetch_assoc($user_result);

    // Set session user
    $_SESSION["user"] = $user_data["username"];
    $_SESSION["nama_lengkap"] = $user_data["nama_lengkap"];
    $_SESSION["role_id"] = $user_data["role_id"];

    // Redirect ke halaman dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    // User tidak ditemukan
    show_error("Username atau password salah!");
  }
}

// Fungsi untuk logout user
function logout_user() {
  // Hapus semua session
  session_unset();

  // Hancurkan session
  session_destroy();

  // Redirect ke halaman login
  header("Location: login.php");
  exit;
}

// Fungsi untuk cek apakah user sudah login
function is_logged_in() {
  return isset($_SESSION["user"]);
}

// Fungsi untuk mendapatkan role user
function get_user_role() {
  return $_SESSION["role_id"];
}

// Fungsi untuk cek apakah user memiliki hak akses
function has_permission($permission) {
  global $conn;

  // Query untuk mendapatkan role user
  $role_query = "SELECT * FROM roles WHERE role_id = '" . get_user_role() . "'";
  $role_result = mysqli_query($conn, $role_query);
  $role_data = mysqli_fetch_assoc($role_result);

  // Cek apakah role user memiliki permission yang diinputkan
  $permissions = explode(",", $role_data["permissions"]);
  return in_array($permission, $permissions);
}

?>
