<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
  header("Location: ../login.php");
  exit;
}

// Include connection (replace with your actual path)
require_once "config.php";

// Get total kelas, murid, dan nilai
$kelas_count_query = "SELECT COUNT(*) AS total_kelas FROM kelas";
$kelas_count_result = mysqli_query($conn, $kelas_count_query);
$kelas_count_data = mysqli_fetch_assoc($kelas_count_result);

$murid_count_query = "SELECT COUNT(*) AS total_murid FROM murid";
$murid_count_result = mysqli_query($conn, $murid_count_query);
$murid_count_data = mysqli_fetch_assoc($murid_count_result);

$nilai_count_query = "SELECT COUNT(*) AS total_nilai FROM nilai";
$nilai_count_result = mysqli_query($conn, $nilai_count_query);
$nilai_count_data = mysqli_fetch_assoc($nilai_count_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Nilai Murid TK - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhckVAQ33B5d5bAv5/iy6+9W1Q9Y7bYMX0lETAy2cFA7zXqE1029c6kH17sQf" crossorigin="anonymous">
</head>
<body>
  <header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between">
      <h1>Sistem Pengelolaan Nilai Murid TK</h1>
      <p>Welcome, <?php echo $_SESSION["nama_lengkap"] ?? ""; ?></p>
      <a href="../logout.php" class="btn btn-outline-light">Logout</a>
    </div>
  </header>

  <main class="container mt-5">
    <h2>Admin Dashboard</h2>

    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Kelas</h5>
            <p class="card-text">
              <?php echo $kelas_count_data["total_kelas"]; ?>
            </p>
            <a href="../views/admin/kelas/index.php" class="btn btn-primary">Lihat Kelas</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Murid</h5>
            <p class="card-text">
              <?php echo $murid_count_data["total_murid"]; ?>
            </p>
            <a href="../views/admin/murid/index.php" class="btn btn-primary">Lihat Murid</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Nilai</h5>
            <p class="card-text">
              <?php echo $nilai_count_data["total_nilai"]; ?>
            </p>
            <a href="../views/admin/nilai/index.php" class="btn btn-primary">Lihat Nilai</a>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-center py-3 bg-light">
    <div class="container">
      <p>Copyright &copy; <?php echo date("Y"); ?></p>
    </div>
