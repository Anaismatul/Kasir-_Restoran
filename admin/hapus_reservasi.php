<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM reservasi WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Reservasi berhasil dihapus!'); window.location='rekap_reservasi.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus reservasi!'); window.location='rekap_reservasi.php';</script>";
    }
}
?>
