<?php
$host = "localhost";
$user = "username"; // Ganti dengan username MySQL Anda
$pass = "password"; // Ganti dengan password MySQL Anda
$db   = "musik"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>
