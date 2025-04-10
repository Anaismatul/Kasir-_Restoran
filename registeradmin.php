<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $username = mysqli_real_escape_string($conn, $username);
    
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='loginadmin.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal! Username mungkin sudah digunakan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-[#543310]">
    <div class="flex bg-white rounded-lg shadow-lg max-w-4xl w-full">
        <div class="w-1/2 hidden md:block">
            <img src="restaurant.jpeg.jpg" alt="Restaurant" class="w-full h-full object-cover rounded-l-lg">
        </div>
        
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-center">REGISTER ADMIN</h1>
            
            <form class="mt-6" action="" method="POST">
                <div class="mb-4">
                    <input type="text" name="username" placeholder="Username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline" required>
                </div>
                
                <a href="../admin/loginadmin.php" class="text-blue-500 text-sm block text-center mb-4">Sudah punya akun? Login di sini</a>
                
                <button type="submit" class="w-full bg-[#543310] text-white py-2 rounded-md hover:bg-opacity-90 transition">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
