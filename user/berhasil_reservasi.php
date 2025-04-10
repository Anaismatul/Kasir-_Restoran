<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);
    $meja = mysqli_real_escape_string($conn, $_POST['meja']);

    $query = "INSERT INTO reservasi (nama, telepon, tanggal, jam, meja) 
              VALUES ('$nama', '$telepon', '$tanggal', '$jam', '$meja')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Reservasi berhasil!'); window.location='../admin/rekap_reservasi.php';</script>";
    } else {
        echo "<script>alert('Gagal melakukan reservasi.'); window.history.back();</script>";
    }
}
?>
