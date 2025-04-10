<?php
include 'config/koneksi.php';

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "UPDATE reservasi SET status = 'Diterima' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "success";
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak dikirim!";
}
?>
