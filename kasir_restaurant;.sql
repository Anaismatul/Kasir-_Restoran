DROP DATABASE IF EXISTS kasir_restaurant;
CREATE DATABASE kasir_restaurant;
USE kasir_restaurant;

-- Membuat tabel admin untuk login
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL -- Simpan hash password dari PHP password_hash()
);

-- Membuat tabel user untuk login sebagai user biasa
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Membuat tabel menu untuk menyimpan daftar makanan dan minuman
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    kategori ENUM('makanan', 'minuman') NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255) -- URL atau path gambar menu
);

-- Membuat tabel pesanan
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'diproses', 'selesai') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Membuat tabel reservasi
CREATE TABLE reservasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    jumlah_orang INT NOT NULL,
    status ENUM('menunggu', 'dikonfirmasi', 'dibatalkan') DEFAULT 'menunggu',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Menambahkan akun admin default (Password harus di-hash di PHP sebelum disimpan)
INSERT INTO admin (username, password) VALUES ('admin', 'hashed_password');

-- Menambahkan akun user default
INSERT INTO users (username, password) VALUES ('user', 'hashed_password');
