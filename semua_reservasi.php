<?php
include '../config/koneksi.php';

// Ambil semua data reservasi dari database
$query = "SELECT * FROM reservasi ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Reservasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F4E1] min-h-screen">
    <header class="bg-[#5A3E1B] text-white text-center py-4 text-2xl font-bold">SEMUA RESERVASI</header>
    
    <main class="p-6 flex justify-center">
        <div class="w-full max-w-5xl">
            <!-- Tombol Kembali -->
            <div class="mb-4">
                <a href="../user/reservasi.php" class="bg-gray-600 text-white px-4 py-2 rounded-md">← Kembali</a>
            </div>

            <table class="w-full border-collapse border border-gray-700 text-left">
                <thead class="bg-[#5A3E1B] text-white">
                    <tr>
                        <th class="border border-gray-700 p-2">No</th>
                        <th class="border border-gray-700 p-2">Nama</th>
                        <th class="border border-gray-700 p-2">Nomor Hp</th>
                        <th class="border border-gray-700 p-2">Tanggal</th>
                        <th class="border border-gray-700 p-2">Jam</th>
                        <th class="border border-gray-700 p-2">Nomor Meja</th>
                        <th class="border border-gray-700 p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) : 
                    ?>
                        <tr class="bg-white">
                            <td class="border border-gray-700 p-2"><?= $no++; ?></td>
                            <td class="border border-gray-700 p-2"><?= htmlspecialchars($row['nama']); ?></td>
                            <td class="border border-gray-700 p-2"><?= htmlspecialchars($row['telepon']); ?></td>
                            <td class="border border-gray-700 p-2"><?= htmlspecialchars($row['tanggal']); ?></td>
                            <td class="border border-gray-700 p-2"><?= htmlspecialchars($row['jam']); ?></td>
                            <td class="border border-gray-700 p-2"><?= htmlspecialchars($row['meja']); ?></td>
                            <td class="border border-gray-700 p-2">
                                <?php if ($row['status'] == 'Diterima') : ?>
                                    <span class="text-green-600 font-semibold">Diterima</span>
                                <?php else : ?>
                                    <span class="text-yellow-600 font-semibold">Menunggu</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Jika tidak ada data -->
            <?php if (mysqli_num_rows($result) == 0): ?>
                <div class="text-center text-gray-700 text-lg font-semibold mt-6">
                    Tidak ada reservasi yang masuk.
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
