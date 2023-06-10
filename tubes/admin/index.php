<?php
session_start();
require 'functions.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
date_default_timezone_set('Asia/Jakarta');

$currentTime = date('H');

if ($currentTime >= 5 && $currentTime < 10) {
    $greeting = 'selamat pagi';
} elseif ($currentTime >= 10 && $currentTime < 15) {
    $greeting = 'selamat siang';
} elseif ($currentTime >= 15 && $currentTime < 18) {
    $greeting = 'selamat sore';
} else {
    $greeting = 'selamat malam';
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin ALL News</title>
    <link rel="stylesheet" href="asset/css/admin.css" />
    <link rel="stylesheet" href="asset/css/color-1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</head>

<body>
    <div id="container" class="main-container">
        <div class="aside">
            <div class="logo">
                <a href="index.php"><span>Titik</span></a>
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <ul class="nav">
                <li>
                    <a href="asset/tampilan/tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah Data</span></i></a>
                </li>
                <li>
                    <a href="asset/tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus Data</span></i></a>
                </li>
                <li>
                    <a href="asset/tampilan/tampilanubah.php" class="active"><i class="uil uil-edit"><span>Edit</span></i></a>
                </li>
                <li>
                    <a href="lihat.php" class="active" onclick="toggleDropdown('dropdown1')"><i class="uil uil-eye"><span>lihat</span></i></a>
                </li>
                <li>
                    <a href="../logout.php"><i class="uil uil-sign-out-alt"><span>Log Out</span></i></a>
                </li>


                <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
            </ul>

            <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
        </div>


        <div class="main-content">
            <section id="home" class="home section">
                <div class="container">
                    <div class="row">
                        <div class="home-info padd-15">
                            <h3 class="hello">
                                Hello, <?= $greeting; ?> <span class="name">Admin!</span>
                            </h3>
                            <div class="row">
                                <h3 class="my-profession">
                                    Mau ngapain nih, min? <br>
                                    Mau tambah berita, ubah berita, atau hapus berita? <br>
                                    Seperti biasa tinggal klik opsi CRUD di bagian kiri, yaa! <br>
                                </h3>
                            </div>
                        </div>
                        <div class="home-img padd-15">
                            <img src="img/Admin-Profile.png" alt="home" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    </div>
    <script src="https://kit.fontawesome.com/49181759c3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="asset/js/nav.js"></script>
</body>

</html>