<?php
$file_path = 'config/koneksi.php';
if (!file_exists($file_path)) {
    die(json_encode(["error" => "File $file_path tidak ditemukan!"]));
}
include $file_path;

header("Content-Type: application/json");

// Ambil data dari request
$data = json_decode(file_get_contents('php://input'), true);

// Validasi data
if (!$data || !isset($data['pesanan']) || !isset($data['total']) || !isset($data['nama']) || !isset($data['user_id'])) {
    echo json_encode(["error" => "Data tidak lengkap!"]);
    exit;
}

// Ambil data dari request
$user_id = intval($data['user_id']);
$nama = htmlspecialchars($data['nama']);
$total = intval($data['total']);
$status = 'pending'; // Bisa diganti sesuai kebutuhan
$created_at = date("Y-m-d H:i:s");

// Pisahkan kategori makanan, cemilan, minuman
$makanan = [];
$cemilan = [];
$minuman = [];

foreach ($data['pesanan'] as $item => $details) {
    if (strpos(strtolower($item), 'bakmi') !== false || strpos(strtolower($item), 'rawon') !== false || strpos(strtolower($item), 'tongseng') !== false 
    ||strpos(strtolower($item), 'garang') !== false ||strpos(strtolower($item), 'gudeg') !== false ||strpos(strtolower($item), 'soto') !== false ) {
        $makanan[] = $item;
    } elseif (strpos(strtolower($item), 'klepon') !== false || strpos(strtolower($item), 'bakwan') !== false || strpos(strtolower($item), 'mendoan') !== false
    || strpos(strtolower($item), 'tiwul') !== false || strpos(strtolower($item), 'serabi') !== false || strpos(strtolower($item), 'lumpia') !== false) {
        $cemilan[] = $item;
    } else {
        $minuman[] = $item;
    }
}

$makananStr = implode(", ", $makanan);
$cemilanStr = implode(", ", $cemilan);
$minumanStr = implode(", ", $minuman);

// Simpan ke database
$query = "INSERT INTO pesanan (user_id, total, status, created_at, nama, makanan, cemilan, minuman, total_harga, tanggal_pesanan) 
          VALUES ('$user_id', '$total', '$status', '$created_at', '$nama', '$makananStr', '$cemilanStr', '$minumanStr', '$total', '$created_at')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => "Pesanan berhasil disimpan!", "total" => $total]);
} else {
    echo json_encode(["error" => "Gagal menyimpan pesanan: " . mysqli_error($conn)]);
}
?>
