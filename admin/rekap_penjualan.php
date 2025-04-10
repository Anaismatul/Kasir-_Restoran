<?php
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $hapusQuery = "DELETE FROM pesanan WHERE id = $id";
    mysqli_query($conn, $hapusQuery);
    header('Location: rekap_penjualan.php');
    exit;
}

$create_at = date('Y-m-d H:i:s');

$query = "SELECT id, nama, makanan, cemilan, minuman, total_harga, created_at FROM pesanan ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$nomor = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            text-align: left;
            font-family: Arial, sans-serif;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #543310;
        }
        .popup-content h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 10px;
            border-bottom: 2px solid #543310;
            padding-bottom: 10px;
        }
        .popup-content p {
            font-size: 1rem;
            margin: 5px 0;
        }
        .popup-content .popup-footer {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            color: #543310;
        }
        .popup-visible {
            visibility: visible;
            opacity: 1;
        }
    </style>
    <script>
        function cetakStruk(nama, makanan, cemilan, minuman, total, tanggal) {
            document.getElementById('popup-nama').innerText = nama;
            document.getElementById('popup-makanan').innerText = makanan || '-';
            document.getElementById('popup-cemilan').innerText = cemilan || '-';
            document.getElementById('popup-minuman').innerText = minuman || '-';
            document.getElementById('popup-total').innerText = 'Rp' + total;
            document.getElementById('popup-tanggal').innerText = tanggal;
            document.getElementById('popup').classList.add('popup-visible');
            alert("Struk berhasil dicetak!");
        }
        function tutupPopup() {
            document.getElementById('popup').classList.remove('popup-visible');
        }
        function hapusPesanan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                window.location.href = '?hapus=' + id;
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-[#543310]">
    <section class="bg-white p-6 rounded-lg shadow-lg max-w-5xl w-full relative">
        <button onclick="window.location.href='../admin/pesanan.php'" class="absolute top-4 right-4 text-[#543310] text-2xl font-bold">&times;</button>
        <header class="text-2xl font-bold text-center text-gray-800 mb-6">Rekap Penjualan</header>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-400 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-[#543310] text-white">
                        <th class="p-3 border border-gray-400">No</th>
                        <th class="p-3 border border-gray-400">Nama</th>
                        <th class="p-3 border border-gray-400">Makanan</th>
                        <th class="p-3 border border-gray-400">Cemilan</th>
                        <th class="p-3 border border-gray-400">Minuman</th>
                        <th class="p-3 border border-gray-400">Total Harga</th>
                        <th class="p-3 border border-gray-400">Tanggal</th>
                        <th class="p-3 border border-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="text-center even:bg-gray-100 hover:bg-gray-200 transition">
                            <td class="p-3 border border-gray-400 font-semibold"><?= $nomor++ ?></td>
                            <td class="p-3 border border-gray-400"><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="p-3 border border-gray-400"><?= !empty($row['makanan']) ? htmlspecialchars($row['makanan']) : '-' ?></td>
                            <td class="p-3 border border-gray-400"><?= !empty($row['cemilan']) ? htmlspecialchars($row['cemilan']) : '-' ?></td>
                            <td class="p-3 border border-gray-400"><?= !empty($row['minuman']) ? htmlspecialchars($row['minuman']) : '-' ?></td>
                            <td class="p-3 border border-gray-400 text-green-600 font-semibold">Rp<?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                            <td class="p-3 border border-gray-400"><?= date('d-m-Y H:i:s', strtotime($row['created_at'])) ?></td>
                            <td class="p-3 border border-gray-400">
    <button onclick="cetakStruk('<?= htmlspecialchars($row['nama']) ?>', '<?= htmlspecialchars($row['makanan']) ?>', '<?= htmlspecialchars($row['cemilan']) ?>', '<?= htmlspecialchars($row['minuman']) ?>', '<?= number_format($row['total_harga'], 0, ',', '.') ?>', '<?= date('d-m-Y H:i:s', strtotime($row['created_at'])) ?>')" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">Cetak</button>
    <!-- <button onclick="hapusPesanan(<?= $row['id'] ?>)" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition ml-2">Hapus</button> -->
</td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <div id="popup" class="popup-overlay">
        <div class="popup-content">
            <button class="close-button" onclick="tutupPopup()">&times;</button>
            <h2>Struk Pembelian</h2>
            <p><strong>Nama:</strong> <span id="popup-nama"></span></p>
            <p><strong>Makanan:</strong> <span id="popup-makanan"></span></p>
            <p><strong>Cemilan:</strong> <span id="popup-cemilan"></span></p>
            <p><strong>Minuman:</strong> <span id="popup-minuman"></span></p>
            <p><strong>Total Harga:</strong> <span id="popup-total"></span></p>
            <p><strong>Tanggal:</strong> <span id="popup-tanggal"></span></p>
            <p class="popup-footer">Terima kasih atas pembelian anda!</p>
        </div>
    </div>
</body>
</html>
