<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oemah Dhahar - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#543310] text-white h-full p-5 flex flex-col space-y-6">
            <h1 class="text-3xl font-bold border-b border-white pb-4">Oemah Dhahar</h1>
            <nav class="flex-1">
                <ul class="space-y-4">
                    <li><a href="../admin/pesanan.php" class="block p-3 rounded hover:bg-[#754922] transition">Pesanan</a></li>
                    <li><a href="../admin/rekap_reservasi.php" class="block p-3 rounded hover:bg-[#754922] transition">Reservasi</a></li>
                    <li><a href="../admin/rekap_penjualan.php" class="block p-3 rounded hover:bg-[#754922] transition">Rekap</a></li>
                </ul>
            </nav>
            <a href="../admin/loginadmin.php" class="block p-3 flex items-center hover:bg-[#754922] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16 17v-2h-4v-2h4v-2l4 3-4 3zm-2 3h-10v-14h10v4h2v-5c0-1.1-.9-2-2-2h-10c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-5h-2v4z"/>
                </svg>
                Logout
            </a>
        </aside>

        <!-- Content -->
        <div class="flex-1 p-10 space-y-5">
            <!-- Welcome Message -->
            <div class="bg-[#754922] text-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold">Hi, Admin!</h2>
                <p class="text-white">Selamat datang di dashboard Oemah Dhahar.</p>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <!-- Kalender -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2 text-[#754922]">Kalender</h3>
                    <iframe src="https://calendar.google.com/calendar/embed?src=id.indonesian%23holiday%40group.v.calendar.google.com&ctz=Asia/Jakarta" style="border: 0" width="100%" height="250" frameborder="0" scrolling="no"></iframe>
                </div>
                <!-- Jam Modern -->
                <div class="bg-white p-4 rounded-lg  flex items-center justify-center shadow-lg border-l-4 border-[#543310]">
                    <div id="modern-clock" class="text-[#754922] text-4xl font-semibold"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            const clockElement = document.getElementById('modern-clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock(); // Run immediately
    </script>
</body>
</html>
