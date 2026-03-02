<?php
// Panggil koneksi database
include '../config/config.php';

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    
    // Tangkap ID-nya
    $id = $_GET['id'];

    // Buat perintah SQL untuk menghapus data berdasarkan ID
    $query = "DELETE FROM tamu WHERE id = '$id'";

    // Jalankan perintahnya
    if (mysqli_query($conn, $query)) {
        // Jika berhasil dihapus, langsung kembali ke halaman tamu
        header("Location: ../tamu.php?pesan=hapus_sukses");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }

} else {
    // Jika ada yang mencoba akses file ini tanpa ID, kembalikan ke halaman tamu
    header("Location: ../tamu.php");
    exit();
}
?>