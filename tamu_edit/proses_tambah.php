<?php
// Panggil koneksi database (sesuaikan letak ../ jika perlu)
include '../config/config.php';

// Cek apakah ada request dari form POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Tangkap data dari form modal
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $telp     = mysqli_real_escape_string($conn, $_POST['telp']);
    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Buat perintah SQL untuk menambah data
    $query = "INSERT INTO tamu (nama_lengkap, email, no_telepon, tanggal_checkin, tanggal_checkout) 
              VALUES ('$nama', '$email', '$telp', '$checkin', '$checkout')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika sukses tersimpan, arahkan kembali ke halaman tamu
        header("Location: ../tamu.php?pesan=tambah_sukses");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    // Jika diakses langsung tanpa lewat form, kembalikan ke halaman tamu
    header("Location: ../tamu.php");
    exit();
}
?>