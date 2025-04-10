<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Restoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#543310] flex items-center justify-center min-h-screen">

    <!-- Container -->
    <div class="relative bg-white p-5 rounded-lg shadow-lg max-w-3xl w-full flex items-center border border-[#3c240b]">
        
        <!-- Bagian Kiri: Gambar Makanan -->
        <div class="w-1/2 relative hidden md:block">
            <img src="../img/logo.jpg" alt="Food Image" class="w-full h-full object-cover rounded-l-lg">
        </div>

        <!-- Bagian Kanan: Form Reservasi -->
        <div class="w-full md:w-1/2 bg-white p-8  text-[#543310]">
            <h2 class="text-3xl font-bold text-center mb-6">Reservasi Meja</h2>

            <form id="reservasiForm" class="space-y-4">
                <input type="text" name="nama" placeholder="Nama" required class="w-full p-3 bg-[#e0c9a6] text-[#543310] rounded-md focus:ring-2 focus:ring-[#543310] outline-none"/>
                
                <input type="text" name="telepon" placeholder="Nomor Telepon" required class="w-full p-3 bg-[#e0c9a6] text-[#543310] rounded-md focus:ring-2 focus:ring-[#543310] outline-none"/>
                
                <div class="flex gap-2">
                    <input type="date" name="tanggal" required class="w-1/2 p-3 bg-[#e0c9a6] text-[#543310] rounded-md focus:ring-2 focus:ring-[#543310] outline-none"/>
                    <select name="jam" class="w-1/2 p-3 bg-[#e0c9a6] text-[#543310] rounded-md focus:ring-2 focus:ring-[#543310] outline-none">
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="09:00">09:00-11:00</option>
                        <option value="12:00">13:00-15.00</option>
                        <option value="19:30">16:00-18:00</option>
                        <option value="19:30">19:00-21:00</option>

                    </select>
                </div>

                <select name="nomor-meja" class="w-full p-3 bg-[#e0c9a6] text-[#543310] rounded-md focus:ring-2 focus:ring-[#543310] outline-none">
                <option value="" disabled selected>Pilih Nomor Meja</option>
                    <option value="1">Meja 1</option>
                    <option value="2">Meja 2</option>
                    <option value="3">Meja 3</option>
                    <option value="4">Meja 4</option>
                    <option value="5">Meja 5</option>
                    <option value="6">Meja 6</option>
                    <option value="7">Meja 7</option>
                    <option value="8">Meja 8</option>
                    <option value="9">Meja 9</option>
                    <option value="10">Meja 10</option>
                    <option value="10">Meja 11</option>
                    <option value="12">Meja 12</option>
                    <option value="13">Meja 13</option>
                    <option value="14">Meja 14</option>
                    <option value="15">Meja 15</option>
                    <option value="16">Meja 16</option>
                    <option value="17">Meja 17</option>
                    <option value="18">Meja 18</option>
                    <option value="19">Meja 19</option>
                    <option value="20">Meja 20</option>
                </select>

                <button type="submit" class="w-full bg-[#543310] text-white py-3 rounded-md font-semibold hover:bg-[#3c240b] transition">Reservasi Sekarang</button>
            </form>

            <p class="text-center text-[#543310] mt-4">Kembali ke <a href="../user/dashboard_pelanggan.php" class="text-[#6b4423] font-semibold hover:underline">Dashboard</a></p>
        </div>
    </div>
    
    <!-- Modal Pop-up -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
            <p class="text-lg font-semibold text-[#543310]">Terimakasih Sudah Reservasi di Oemah Dhahar, Kami Tunggu Kedatangannya!</p>
            <button onclick="kembaliDashboard()" class="mt-4 bg-[#543310] text-white px-4 py-2 rounded-md hover:bg-white hover:text-[#543310] border border-[#543310] transition">Kembali</button>
        </div>

    <script>
        function kembaliDashboard() {
    window.location.href = '../user/dashboard_pelanggan.php';
}

        document.getElementById('reservasiForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah reload halaman

    let formData = new FormData(this);

    fetch('../insert_reservasi.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Ubah ke JSON
    .then(data => {
        if (data.success) {
            document.getElementById('popup').classList.remove('hidden');
        } else {
            alert("Terjadi kesalahan: " + data.message);
        }
    })
    .catch(error => {
        alert("Terjadi kesalahan saat mencari data.");
        console.error("Error:", error);
    });
});
    </script>
</body>
</html>
