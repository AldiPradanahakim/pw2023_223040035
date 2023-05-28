<?php
// session_start();

// // Memeriksa apakah pengguna telah login dan memiliki role admin
// if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
//     header("Location: ../login.php");
//     exit();
// }
date_default_timezone_set('Asia/Jakarta');

$currentTime = date('H');

if ($currentTime >= 5 && $currentTime < 10) {
    $greeting = 'Selamat pagi';
} elseif ($currentTime >= 10 && $currentTime < 15) {
    $greeting = 'Selamat siang';
} elseif ($currentTime >= 15 && $currentTime < 18) {
    $greeting = 'Selamat sore';
} else {
    $greeting = 'Selamat malam';
}

?>



<?php require('partials/header.php'); ?>
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
                <a href="../logout.php">LogOut</a>
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
                            Hello,<?= $greeting; ?> <span class="name">Admin</span>
                        </h3>
                        <h3 class="my-profession">
                            Mau ngapain nih min
                        </h3>
                        <a href="#contact" class="btn for-me">For me</a>
                    </div>
                    <div class="home-img padd-15">
                        <img src="img/profil.jpg" alt="home" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</div>

<?php require('partials/footer.php'); ?>