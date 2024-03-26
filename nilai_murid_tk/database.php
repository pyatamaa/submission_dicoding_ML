<?php

include "config.php";

function query($sql) {
    global $conn;
    return mysqli_query($conn, $sql);
}

function escape_string($str) {
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

?>
