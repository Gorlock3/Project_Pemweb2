<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form modal
    $id       = $_POST['id'];
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $telp     = mysqli_real_escape_string($conn, $_POST['telp']);
    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Query untuk update data ke database SQL
    $query = "UPDATE tamu SET 
                nama_lengkap = '$nama', 
                email = '$email', 
                no_telepon = '$telp', 
                tanggal_checkin = '$checkin', 
                tanggal_checkout = '$checkout' 
              WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika sukses, kembali ke halaman tamu
        header("Location: ../tamu.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>