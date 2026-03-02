<?php
$host     = "localhost";
$user     = "root";      // Sesuaikan jika menggunakan username database lain
$password = "Anuger@h1";          // Isi jika root Anda memiliki password
$database = "db_hotel";  // Nama database yang baru saja dibuat

$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>