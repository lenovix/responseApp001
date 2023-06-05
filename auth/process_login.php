<?php
// Koneksi ke database (gunakan kode yang telah Anda buat sebelumnya)
require '../db/koneksi.php';

// Ambil data yang dikirimkan melalui form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan proses autentikasi, misalnya dengan memeriksa kecocokan username dan password dari database
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah autentikasi berhasil
if (mysqli_num_rows($result) == 1) {
    // Autentikasi berhasil, simpan informasi pengguna ke dalam session atau cookie
    session_start();
    $_SESSION['username'] = $username;
    // Redirect ke halaman utama
    header('Location: ../index.php');
} else {
    // Autentikasi gagal, tampilkan pesan error atau redirect kembali ke halaman login
    echo "Username atau password salah.";
}

// Menutup koneksi ke database (gunakan jika sudah selesai)
mysqli_close($koneksi);
?>