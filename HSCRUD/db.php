<?php
// Pengaturan server dengan pengaturan default (pengguna 'root' tanpa kata sandi)
$host = 'localhost'; // Nama server
$user = 'root'; // Nama pengguna database
$pass = ""; // Kata sandi database
$database = 'cobacrud'; // Nama database

// Membangun koneksi
$conn = new mysqli($host, $user, $pass, $database);

// Menampilkan pesan kesalahan jika koneksi tidak terbentuk
if (!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
