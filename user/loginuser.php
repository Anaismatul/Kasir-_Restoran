<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($conn, $username);
    
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard_pelanggan.php");
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('../img/restaurant.jpeg.jpg') no-repeat center center/cover;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Coklat tua lebih gelap */
            z-index: -1;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen relative">
    <div class="bg-white bg-opacity-90 rounded-lg shadow-lg max-w-md w-full p-8">
        <h1 class="text-2xl font-bold text-center">LOGIN USER</h1>
        <p class="text-center text-sm text-gray-600">Atau <a href="../user/resgisteruser.php" class="text-blue-500">Buat Akun</a> jika belum pernah membuat akun</p>
        
        <form class="mt-6" action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700">Username:</label>
                <input type="text" name="username" placeholder="Masukkan Username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline bg-white" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password:</label>
                <input type="password" name="password" placeholder="Masukkan Password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline bg-white" required>
            </div>
            <button type="submit" class="w-full bg-[#543310] text-white py-2 rounded-md hover:bg-opacity-90 transition">LOGIN</button>
            <a href="../admin/loginadmin.php" class="text-blue-500 text-sm block text-center mt-4">Login Sebagai Admin</a>
        </form>
    </div>
</body>
</html>
