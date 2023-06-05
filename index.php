<?php
require './db/koneksi.php';

// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: ./auth/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Response App</title>
    <link rel="stylesheet" href="./css/core.css">
    <link rel="stylesheet" href="./css/customCSS.css">
</head>

<body>
    <div class="sidebar">
        <ul>
            <a href="index">
                <div class="hover selected">
                    <li>Home</li>
                </div>
            </a>
            <a href="./pages/ambulance">
                <div class="hover">
                    <li>Ambulance</li>
                </div>
            </a>
            <a href="./pages/police">
                <div class="hover">
                    <li>Police</li>
                </div>
            </a>
            <a href="./pages/firefighter">
                <div class="hover">
                    <li>Firefighter</li>
                </div>
            </a>
            <a href="./auth/logout.php">
                <div class="hover">
                    <li>Log Out</li>
                </div>
            </a>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat datang,
            <?php echo $_SESSION['username']; ?>!
        </h1>
        <hr>
        <h3>Ichsanul Kamil Sudarmi (001201900001)</h3>
        <h5>Information technology Student</h5>
        <p>Saya adalah seorang mahasiswa tingkat akhir yang sedang mengembangkan aplikasi Emergency Response App. Tujuan
            dari aplikasi ini adalah untuk memberikan respons darurat yang cepat dan efisien dalam situasi darurat.
            Aplikasi ini akan menggunakan algoritma Naive Bayes untuk mengidentifikasi unit apa yang akan dikirim
            berdasarkan informasi yang diterima. Saya telah menetapkan timeline yang ketat untuk pengembangan aplikasi
            ini, dan saya berencana untuk meluncurkannya dalam enam bulan ke depan. Saya juga akan menggunakan berbagai
            tools dan teknologi seperti PHP, MySQL, HTML, CSS, dan JavaScript untuk mengembangkan aplikasi ini dan
            memastikan kinerjanya yang optimal.
        </p>
    </div>
</body>

</html>