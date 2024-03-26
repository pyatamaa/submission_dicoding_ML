<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
  header("Location: ../../../login.php");
  exit;
}

// Include connection (replace with your actual path)
require_once "../../../config.php";

// Get all kelas
$kelas_query = "SELECT * FROM kelas";
$kelas_result = mysqli_query($conn, $kelas_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Nilai Murid TK - Daftar Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhckVAQ33B5d5bAv5/iy6+9W1Q9Y7bYMX0lETAy2cFA7zXqE1029c6kH17sQf" crossorigin="anonymous">
</head>
<body>
  <header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between">
      <h1>Sistem Pengelolaan Nilai Murid TK</h1>
      <p>Welcome, <?php echo $_SESSION["nama_lengkap"] ?? ""; ?></p>
      <a href="../../../logout.php" class="btn btn-outline-light">Logout</a>
    </div>
  </header>

  <main class="container mt-5">
    <h2>Daftar Kelas</h2>

    <a href="create.php" class="btn btn-primary mb-3">Tambah Kelas</a>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kelas</th>
          <th>Tingkat</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($kelas_data = mysqli_fetch_assoc($kelas_result)) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $kelas_data["nama_kelas"] . "</td>";
          echo "<td>" . $kelas_data["tingkat"] . "</td>";
          echo "<td>" . $kelas_data["deskripsi"] . "</td>";
          echo "<td>";
          echo "<a href='edit.php?id=" . $kelas_data["kelas_id"] . "' class='btn btn-sm btn-warning'>Edit</a>";
          echo " <a href='delete.php?id=" . $kelas_data["kelas_id"] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus kelas " . $kelas_data["nama_kelas"] . "?');\">Hapus</a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </main>

  <footer class="text-center py-3 bg-light">
    <div class="container">
      <p>Copyright &copy; <?php echo date("Y"); ?></p>
    </div>
  </footer>

</body>
</html>
