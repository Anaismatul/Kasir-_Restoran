<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oemah Dhahar - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #543310;
        }
    </style>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#543310] text-white h-screen p-5 space-y-6 fixed flex flex-col">
    <div>
        <h1 class="text-3xl font-bold text-white mb-6 border-b border-white pb-4">Oemah Dhahar</h1> <!-- Tambahkan border putih -->
    </div>

    <nav class="flex-1"> <!-- Gunakan mt-auto untuk mendorong menu ke bawah -->
        <ul class="space-y-4">
            <li>
                <a href="../user/reservasi.php" class="block p-3 rounded hover:bg-[#6b4423] hover:text-white transition">
                    Reservasi
                </a>
            </li>
        </ul>
    </nav>

    <div class="mt-[100px]">
        <a href="../user/loginuser.php" class="block p-3 rounded text-left flex items-left justify-left hover:bg-[#6b4423] hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 17v-2h-4v-2h4v-2l4 3-4 3zm-2 3h-10v-14h10v4h2v-5c0-1.1-.9-2-2-2h-10c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-5h-2v4z"/>
            </svg>
            Logout
        </a>
    </div>
</aside>


    
    <!-- Main Content -->
    <main class="ml-72 p-6 w-full max-w-6xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-[var(--primary-color)]">
            <h1 class="text-3xl font-bold text-center mb-6 text-[var(--primary-color)]">Menu Makanan</h1>
            
            <!-- Section Template -->
            <template id="menu-section">
                <h2 class="text-2xl font-semibold mb-3 text-[var(--primary-color)]"></h2>
                <hr class="border-t-2 border-gray-300 mb-4">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6" id="menu-items"></div>
            </template>

            <!-- Food Categories -->
            <div id="menu-container"></div>
        </div>
    </main>

    <script>
        const menuData = {
            "Makanan Berat": [
                { name: "Bakmi Jawa", price: "Rp 25.000", image: "../img/bakmi jawa.jpeg.jpg" },
                { name: "Rawon", price: "Rp 35.000", image: "../img/rawon.jpg" },
                { name: "Tongseng Kambing", price: "Rp 35.000", image: "../img/toseng kambing.jpeg.jpg" },
                { name: "Garang Asem", price: "Rp 35.000", image: "../img/garang asem.jpg" },
                { name: "Gudeg", price: "Rp 25.000", image: "../img/gudeg (1).jpg" },
                { name: "Soto", price: "Rp 25.000", image: "../img/soto kudus.jpg" }
            ],
            "Cemilan": [
                { name: "Klepon", price: "Rp 15.000", image: "../img/klepon.jpg" },
                { name: "Bakwan Jagung", price: "Rp 15.000", image: "../img/bakwan jagung.jpeg.jpg" },
                { name: "Mendoan", price: "Rp 15.000", image: "../img/mendoan.jpg" },
                { name: "Tiwul", price: "Rp 15.000", image: "../img/tiwul.jpg" },
                { name: "Serabi", price: "Rp 20.000", image: "../img/serabi1.jpg" },
                { name: "Lumpia", price: "Rp 20.000", image: "../img/lumpia.jpeg.jpg" }
            ],
            "Minuman": [
                { name: "Es Dawet Ayu", price: "Rp 16.000", image: "../img/es dawet ayu1.jpg" },
                { name: "Wedang Secang", price: "Rp 20.000", image: "../img/wedang secang.jpg" },
                { name: "Teh Poci Gula Batu", price: "Rp 15.000", image: "../img/teh poci gula batu.jpg" },
                { name: "Es Legen", price: "Rp 20.000", image: "../img/es legen.jpg" },
                { name: "Kopi Tubruk", price: "Rp 15.000", image: "../img/kopi tubruk.jpg" },
                { name: "Es Selendang Mayang", price: "Rp 16.000", image: "../img/es selendang mayang.jpg" }
            ]
        };
        
        const menuContainer = document.getElementById("menu-container");
        const menuTemplate = document.getElementById("menu-section");

        Object.keys(menuData).forEach(category => {
            const section = menuTemplate.content.cloneNode(true);
            section.querySelector("h2").textContent = category;
            const menuItemsContainer = section.querySelector("#menu-items");
            
            menuData[category].forEach(item => {
                const menuItem = document.createElement("div");
                menuItem.className = "bg-[var(--primary-color)] text-white p-4 rounded-lg shadow-md flex items-center";
                menuItem.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" class="w-12 h-12 mr-4 rounded">
                    <div>
                        <h3 class="font-semibold">${item.name}</h3>
                        <p class="text-gray-200">${item.price}</p>
                    </div>
                `;
                menuItemsContainer.appendChild(menuItem);
            });
            menuContainer.appendChild(section);
        });
        
    </script>
</body>
</html>
