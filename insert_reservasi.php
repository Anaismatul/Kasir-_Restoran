<?php
include 'config/koneksi.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);
    $meja = mysqli_real_escape_string($conn, $_POST['nomor-meja']); // Sesuai form

    $query = "INSERT INTO reservasi (nama, telepon, tanggal, jam, meja) VALUES ('$nama', '$telepon', '$tanggal', '$jam', '$meja')";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    }
}

mysqli_close($conn);
?>
