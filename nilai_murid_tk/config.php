<?php

define('BASE_URL', 'http://localhost/sistem_nilai_tk/');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sistem_nilai_tk";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    echo "Koneksi ke database gagal!";
    exit;
}

?>
