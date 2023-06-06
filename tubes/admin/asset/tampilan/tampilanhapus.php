<?php
session_start();
require('../../functions.php');

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../../../login.php");
    exit();
}

?>
<?php require('../../partials/header.php'); ?>
<div class="main-container">
    <div class="aside">
        <div class="logo">
            <a href="../../index.php"><span>Titik</span></a>
        </div>
        <div class="nav-toggler">
            <span></span>
        </div>
        <ul class="nav">
            <li>
                <a href="../tampilan/tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah Data</span></i></a>
            </li>
            <li>
                <a href="../tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus Data</span></i></a>
            </li>
            <li>
                <a href="../tampilan/tampilanubah.php" class="active"><i class="uil uil-edit"><span>Edit</span></i></a>
            </li>
            <li>
                <a href="../../lihat.php" class="active"><i class="uil uil-eye"><span>lihat</span></i></a>
            </li>
            <li>
                <a href="../logout.php"><i class="uil uil-sign-out-alt"><span>Log Out</span></i></a>
            </li>

            <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
        </ul>

        <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
    </div>

    <div class="main-content">
        <section id="about" class="about section">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Kategori</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <a href="../hapus/hapus.latest.news.php">
                                <div class="card padd-15">
                                    <i class="uil uil-newspaper"></i>Lastest News
                                </div>
                            </a>
                            <a href="../hapus/hapus.popular.news.php">
                                <div class="card padd-15">
                                    <i class="uil uil-fire"></i>Popular News
                                </div>
                            </a>
                        </div>
                        <div class="row">
                            <a href="../hapus/hapus.world.php">
                                <div class="card padd-15">
                                    <i class="uil uil-globe"></i>World News
                                </div>
                            </a>
                            <a href="../hapus/hapus.rekomendasi.php">
                                <div class="card padd-15">
                                    <i class="uil uil-thumbs-up"></i>Rekomendasi For You
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php require('../../partials/footer.php'); ?>