<?php
include '../config/koneksi.php';

// Ambil tanggal hari ini untuk tampilan awal
$tanggal_hari_ini = date("Y-m-d");
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : $tanggal_hari_ini;

// Ambil reservasi berdasarkan tanggal
$query = "SELECT * FROM reservasi WHERE tanggal = '$tanggal' ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
$reservasi_count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Kasir Restoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-[#F8F4E1] min-h-screen">
<header class="bg-[#5A3E1B] text-white py-4 text-2xl font-bold flex items-center relative">
    <div class="absolute left-1/2 transform -translate-x-1/2">RESERVASI</div>
    <a href="../admin/dashboard_admin.php" class="ml-auto flex items-center text-white px-4 py-2 rounded-md text-sm hover:text-gray-300 transition mr-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
            <path d="M16 17v-2h-4v-2h4v-2l4 3-4 3zm-2 3h-10v-14h10v4h2v-5c0-1.1-.9-2-2-2h-10c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-5h-2v4z"/>
        </svg>
        Kembali
    </a>
</header>

<main class="p-6 flex justify-center">
    <div class="w-full max-w-5xl">
        <!-- Form Pencarian -->
        <form method="POST" id="search-form" class="flex justify-between mb-4">
            <div class="flex gap-2">
                <input type="date" name="tanggal" id="tanggal" class="p-2 border border-gray-300 rounded-md" value="<?= $tanggal ?>">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Cari</button>
                <button type="button" id="reset-button" class="bg-gray-600 text-white px-4 py-2 rounded-md">Reset</button>
            </div>
            <button type="button" id="lihat-semua" class="bg-green-600 text-white px-4 py-2 rounded-md">Lihat Semua Reservasi</button>
        </form>

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
                    <th class="border border-gray-700 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="reservasi-data">
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
                        <td class="border border-gray-700 p-2 status-<?= $row['id']; ?>">
                            <?= htmlspecialchars($row['status'] ?? 'Menunggu') ?>
                        </td>
                        <td class="border border-gray-700 p-2">
                            <button class="bg-green-600 text-white px-4 py-1 rounded-md accept-btn"
                                    data-id="<?= $row['id']; ?>">Terima</button>
                            <a href="hapus_reservasi.php?id=<?= $row['id']; ?>" 
                               class="bg-red-600 text-white px-4 py-1 rounded-md delete-btn"
                               onclick="return confirm('Yakin ingin menghapus reservasi ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pesan jika tidak ada reservasi -->
        <div class="text-center text-gray-700 text-lg font-semibold mt-6 <?= $reservasi_count > 0 ? 'hidden' : '' ?>" id="no-reservasi">
            Tidak ada reservasi yang masuk.
        </div>
    </div>
</main>

<script>
// Fungsi global untuk mengecek apakah harus menampilkan "Tidak ada reservasi"
function cekTidakAdaReservasi() {
    if ($("#reservasi-data").children().length === 0) {
        $("#no-reservasi").show();
    } else {
        $("#no-reservasi").hide();
    }
}

$(document).ready(function() {
    let today = new Date().toISOString().split("T")[0]; 
    $("#tanggal").val("<?= $tanggal ?>");

    // CARI RESERVASI
    $("#search-form").submit(function(e) {
        e.preventDefault();
        let selectedDate = $("#tanggal").val();

        $.ajax({
            url: "../ambil_reservasi.php",
            type: "POST",
            data: { tanggal: selectedDate },
            success: function(response) {
                $("#reservasi-data").html(response);
                cekTidakAdaReservasi();
            },
            error: function() {
                alert("Terjadi kesalahan saat mencari data.");
            }
        });
    });

    // RESET FILTER KE TANGGAL HARI INI
    $("#reset-button").click(function() {
        $("#tanggal").val(today);

        $.ajax({
            url: "../ambil_reservasi.php",
            type: "POST",
            data: { tanggal: today },
            success: function(response) {
                $("#reservasi-data").html(response);
                cekTidakAdaReservasi();
            },
            error: function() {
                alert("Terjadi kesalahan saat mereset data.");
            }
        });
    });

    // LIHAT SEMUA RESERVASI
    $("#lihat-semua").click(function() {
        $.ajax({
            url: "../ambil_reservasi.php",
            type: "POST",
            data: { semua: "true" },
            success: function(response) {
                $("#reservasi-data").html(response);
                cekTidakAdaReservasi();
            },
            error: function() {
                alert("Terjadi kesalahan saat mengambil semua reservasi.");
            }
        });
    });

    // CEK SAAT HALAMAN DIMUAT
    cekTidakAdaReservasi();
});

// TERIMA RESERVASI
$(document).on("click", ".accept-btn", function () {
    const reservasiId = $(this).data("id");

    if (confirm("Apakah Anda yakin ingin menerima reservasi ini?")) {
        $.ajax({
    url: "../terima_reservasi.php",  // Pastikan path benar
    type: "POST",
    data: { id: reservasiId },
    success: function (response) {
        console.log("Response dari PHP:", response);  // Cek di Console
        if (response.trim() === "success") {
            alert("Reservasi diterima!");
            $(`.status-${reservasiId}`).text("Diterima");
        } else {
            alert("Gagal memperbarui status: " + response);
        }
    },
    error: function (xhr, status, error) {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat mengubah status reservasi.");
    },
});
    }
});

</script>
</body>
</html>
