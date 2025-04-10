<?php
include 'config/koneksi.php';

// Debugging untuk melihat apakah request POST diterima
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    error_log("Data POST diterima: " . print_r($_POST, true));
}

// Jika tombol "Lihat Semua Reservasi" diklik
if (isset($_POST['semua']) && $_POST['semua'] == "true") {
    $query = "SELECT * FROM reservasi ORDER BY tanggal DESC";
} elseif (isset($_POST['tanggal'])) {
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $query = "SELECT * FROM reservasi WHERE tanggal = '$tanggal' ORDER BY tanggal DESC";
} else {
    echo "error";
    exit;
}

// Eksekusi query
$result = mysqli_query($conn, $query);

// Jika ada data, tampilkan dalam format HTML
if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr class='bg-white'>
                <td class='border border-gray-700 p-2'>{$no}</td>
                <td class='border border-gray-700 p-2'>" . htmlspecialchars($row['nama']) . "</td>
                <td class='border border-gray-700 p-2'>" . htmlspecialchars($row['telepon']) . "</td>
                <td class='border border-gray-700 p-2'>" . htmlspecialchars($row['tanggal']) . "</td>
                <td class='border border-gray-700 p-2'>" . htmlspecialchars($row['jam']) . "</td>
                <td class='border border-gray-700 p-2'>" . htmlspecialchars($row['meja']) . "</td>
                <td class='border border-gray-700 p-2 status-{$row['id']}'>" . htmlspecialchars($row['status'] ?? 'Menunggu') . "</td>
                <td class='border border-gray-700 p-2'>
                    <button class='bg-green-600 text-white px-4 py-1 rounded-md accept-btn' data-id='{$row['id']}'>Terima</button>
                    <a href='../admin/hapus_reservasi.php?id={$row['id']}' class='bg-red-600 text-white px-4 py-1 rounded-md delete-btn'>Hapus</a>
                </td>
            </tr>
        ";
        $no++;
    }
} else {
    echo "<tr><td colspan='8' class='text-center text-gray-700 p-4'>Tidak ada reservasi yang masuk.</td></tr>";
}
?>
