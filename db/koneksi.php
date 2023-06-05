<?php
// Konfigurasi koneksi database
$host = "localhost"; // Ganti dengan nama host Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$database = "responseapp"; // Ganti dengan nama database Anda

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Setel pengaturan karakter
mysqli_set_charset($koneksi, "utf8");

// Contoh penggunaan koneksi:
// 
// }

?>