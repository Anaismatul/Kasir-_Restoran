
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Restoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #543310;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-3 text-[var(--primary-color)]">Makanan Berat</h2>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Bakmi Jawa" data-price="25000">
                <img src="../img/bakmi jawa.jpeg.jpg" alt="Bakmi Jawa" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Bakmi Jawa</h3>
                    <p class="text-[var(--primary-color)]">Rp 25.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Rawon" data-price="35000">
                <img src="../img/rawon.jpg" alt="Rawon" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Rawon</h3>
                    <p class="text-[var(--primary-color)]">Rp 35.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Tongseng Kambing" data-price="35000">
                <img src="../img/toseng kambing.jpeg.jpg" alt="Tongseng Kambing" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Tongseng Kambing</h3>
                    <p class="text-[var(--primary-color)]">Rp 35.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Garang Asem" data-price="35000">
                <img src="../img/garang asem.jpg" alt="Garang Asem" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Garang Asem</h3>
                    <p class="text-[var(--primary-color)]-200">Rp 35.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Gudeg" data-price="25000">
                <img src="../img/gudeg (1).jpg" alt="Gudeg" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Gudeg</h3>
                    <p class="text-[var(--primary-color)]">Rp 25.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Soto" data-price="25000">
                <img src="../img/soto kudus.jpg" alt="Soto" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Soto</h3>
                    <p class="text-[var(--primary-color)]">Rp 25.000</p>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-3 text-[var(--primary-color)]">Cemilan</h2>
        <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Klepon" data-price="15000">
        <img src="../img/klepon.jpg" alt="Klepon" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Klepon</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Bakwan Jagung" data-price="15000">
            <img src="../img/bakwan jagung.jpeg.jpg" alt="Bakwan Jagung" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Bakwan Jagung</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Mendoan" data-price="15000">
                <img src="../img/mendoan.jpg" alt="Mendoan" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Mendoan</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Tiwul" data-price="15000">
                <img src="../img/tiwul.jpg" alt="Tiwul" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Tiwul</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Serabi" data-price="20000">
                <img src="../img/serabi1.jpg" alt="Serabi" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Serabi</h3>
                    <p class="text-[var(--primary-color)]">Rp 20.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Lumpia" data-price="20000">
                <img src="../img/lumpia.jpeg.jpg" alt="Lumpia" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Lumpia</h3>
                    <p class="text-[var(--primary-color)]">Rp 20.000</p>
                </div>
            </div>
    </div>

            <h2 class="text-2xl font-semibold mb-3 text-[var(--primary-color)]">Minuman</h2>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Es Dawet Ayu" data-price="16000">
                <img src="../img/es dawet ayu1.jpg" alt="Es Dawet Ayu" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Es Dawet Ayu</h3>
                    <p class="text-[var(--primary-color)]">Rp 16.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Wedang Secang" data-price="20000">
                <img src="../img/wedang secang.jpg" alt="Wedang Secang" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Wedang Secang</h3>
                    <p class="text-[var(--primary-color)]">Rp 20.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Teh Poci Gula Batu" data-price="15000">
                <img src="../img/teh poci gula batu.jpg" alt="Teh Poci Gula Batu" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Teh Poci Gula Batu</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Es Legen" data-price="20000">
                <img src="../img/es legen.jpg" alt="Es Legen" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Es Legen</h3>
                    <p class="text-[var(--primary-color)]">Rp 20.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Kopi Tubruk" data-price="15000">
                <img src="../img/kopi tubruk.jpg" alt="Kopi Tubruk" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Kopi Tubruk</h3>
                    <p class="text-[var(--primary-color)]">Rp 15.000</p>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded-lg flex items-center cursor-pointer" data-name="Es Selendang Mayang" data-price="16000">
                <img src="../img/es selendang mayang.jpg" alt="Es Selendang Mayang" class="w-16 h-16 mr-4 rounded">
                <div>
                    <h3 class="font-semibold">Es Selendang Mayang</h3>
                    <p class="text-[var(--primary-color)]">Rp 16.000</p>
                </div>
                <div class="fixed bottom-6 right-6">
            </div>
    </main>
    
    <aside class="w-1/4 bg-white p-4 shadow-lg h-screen sticky top-0 overflow-y-auto flex flex-col">
    <h2 class="text-xl font-semibold mb-4 text-[var(--primary-color)]">Checkout</h2>
    <div id="checkout-items" class="mb-4 flex-1 overflow-y-auto">
        <p class="text-gray-600">Belum ada item</p>
    </div>
    <div class="text-right">
        <p class="text-lg font-semibold">Total: <span id="total-price">Rp 0</span></p>
        <button id="pay-button" class="bg-[var(--primary-color)] text-white px-6 py-2 rounded-md w-full mt-2">Bayar</button>
    </div>
    <div class="mt-auto">
        <a href="../admin/dashboard_admin.php" class="block p-3 text-right flex items-center justify-start hover:text-[#754922] transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 17v-2h-4v-2h4v-2l4 3-4 3zm-2 3h-10v-14h10v4h2v-5c0-1.1-.9-2-2-2h-10c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-5h-2v4z"/>
            </svg>
            Kembali
        </a>
    </div>
</aside>

    <!-- Modal Input Nama -->
    <div id="nameModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-3 text-[var(--primary-color)]">Masukkan Nama Pelanggan</h2>
            <input type="text" id="customerName" class="border p-2 w-full rounded-md" placeholder="Nama Pelanggan">
            <div class="flex justify-end mt-4">
                <button id="cancelModal" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Batal</button>
                <button id="confirmName" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded">OK</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const items = document.querySelectorAll(".bg-white.cursor-pointer");
            const checkoutItems = document.getElementById("checkout-items");
            const totalPriceElement = document.getElementById("total-price");
            const payButton = document.getElementById("pay-button");
            let totalPrice = 0;
            let cart = {};

            items.forEach((item) => {
                item.addEventListener("click", function () {
                    const itemName = this.getAttribute("data-name");
                    const itemPrice = parseInt(this.getAttribute("data-price"));

                    if (!cart[itemName]) {
                        cart[itemName] = { price: itemPrice, quantity: 1 };
                    } else {
                        cart[itemName].quantity += 1;
                    }

                    renderCart();
                });
            });

            function renderCart() {
                checkoutItems.innerHTML = "";

                Object.keys(cart).forEach((itemName) => {
                    const item = cart[itemName];

                    const checkoutItem = document.createElement("div");
                    checkoutItem.classList.add("flex", "justify-between", "items-center", "border-b", "pb-2", "mb-2");

                    checkoutItem.innerHTML = `
                        <span>${itemName}</span>
                        <div class="flex items-center space-x-2">
                            <span class="mr-2">Rp ${item.price.toLocaleString()}</span>
                            <button class="border text-black px-2 py-1 rounded decrease" data-name="${itemName}">−</button>
                            <span>${item.quantity}</span>
                            <button class="border text-black px-2 py-1 rounded increase" data-name="${itemName}">+</button>
                        </div>
                    `;

                    checkoutItems.appendChild(checkoutItem);
                });

                updateTotal();
                addEventListeners();
            }

            function updateTotal() {
                totalPrice = Object.values(cart).reduce((sum, item) => sum + item.price * item.quantity, 0);
                totalPriceElement.textContent = `Rp ${totalPrice.toLocaleString()}`;
            }

            function addEventListeners() {
                document.querySelectorAll(".increase").forEach((button) => {
                    button.addEventListener("click", function () {
                        const itemName = this.getAttribute("data-name");
                        cart[itemName].quantity += 1;
                        renderCart();
                    });
                });

                document.querySelectorAll(".decrease").forEach((button) => {
                    button.addEventListener("click", function () {
                        const itemName = this.getAttribute("data-name");
                        if (cart[itemName].quantity > 1) {
                            cart[itemName].quantity -= 1;
                        } else {
                            delete cart[itemName];
                        }
                        renderCart();
                    });
                });
            }

            document.getElementById("pay-button").addEventListener("click", function () {
    if (Object.keys(cart).length === 0) {
        alert("Tidak ada item dalam pesanan!");
        return;
    }

    // Tampilkan modal input nama
    document.getElementById("nameModal").classList.remove("hidden");
});

// Jika tombol "OK" dalam modal diklik
document.getElementById("confirmName").addEventListener("click", function () {
    const namaPelanggan = document.getElementById("customerName").value.trim();

    if (!namaPelanggan) {
        alert("Nama pelanggan tidak boleh kosong!");
        return;
    }

        const userID = 1; // Gantilah ini dengan ID user yang login

    // Sembunyikan modal setelah nama diisi
    document.getElementById("nameModal").classList.add("hidden");

    // Kirim data ke server
    fetch("../simpan_pesanan.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            user_id: userID,
            nama: namaPelanggan,
            pesanan: cart,
            total: totalPrice
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            alert(data.success);
            cart = {};
            renderCart();
            window.location.href = "../admin/rekap_penjualan.php"; // Redirect setelah pembayaran sukses
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan, periksa konsol untuk detail.");
    });
});

// Jika tombol "Batal" dalam modal diklik
document.getElementById("cancelModal").addEventListener("click", function () {
    document.getElementById("nameModal").classList.add("hidden");
});


        });
    </script>
</body>
</html>
