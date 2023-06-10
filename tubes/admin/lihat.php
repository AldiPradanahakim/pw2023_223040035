<?php
session_start();
require 'functions.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
$news = query("SELECT * FROM latest_news");
$populars = query("SELECT * FROM berita_terpopuler");
$recommendations = query("SELECT * FROM rekomendasi_untuk_anda");
$worlds = query("SELECT * FROM world");





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

<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<body>

    <div class="main-container" id="container">
        <div class="aside no-print">
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
                    <a href="#" onclick="toggleDropdown('dropdown1')"><i class="uil uil-list-ul"><span>List</span></i></a>
                </li>
                <li>
                    <div class="dropdown-content" id="dropdown1">
                        <a href="#1">latest news</a>
                        <a href="#2">popular</a>
                        <a href="#3">world</a>
                        <a href="#4">rekomendasi</a>
                    </div>
                </li>
                <li>
                    <div class="container no-print">
                        <button onclick="window.print()">
                            <i class="bi bi-journal plus">Print</i>
                        </button>
                    </div>
                </li>
                <li>
                    <a href="../logout.php"><i class="uil uil-sign-out-alt"><span>Log Out</span></i></a>
                </li>

                <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
            </ul>

            <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
        </div>

        <div class="main-content">
            <div class="section">
                <section id="1" class="about section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Lates News</h2>

                        </div>
                        <table cellpadding="10" cellspacing="0" class="lihat">
                            <tr class="name">
                                <th class="no">No.</th>
                                <th>title</th>
                                <th>content</th>
                                <th>link</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($news as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no width"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="no"><?= $row["waktu"]; ?></td>
                                    <td class="title"><?= $row["tanggal"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>


                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="2" class="about section ">
                    <div class="container">
                        <div class="section-title">
                            <h2>Berita Terpopuler</h2>
                        </div>
                        <table cellpadding="10" cellspacing="0" class="lihat">
                            <tr class="name">
                                <th class="no">No.</th>
                                <th>title</th>
                                <th>content</th>
                                <th>link</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($populars as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no width"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="no"><?= $row["waktu"]; ?></td>
                                    <td class="title"><?= $row["tanggal"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="3" class="about section ">
                    <div class="container">
                        <div class="section-title">
                            <h2>World</h2>
                        </div>
                        <table cellpadding="10" cellspacing="0" class="lihat">
                            <tr class="name">
                                <th class="no">No.</th>
                                <th>title</th>
                                <th>content</th>
                                <th>link</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($worlds as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no width"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="no"><?= $row["waktu"]; ?></td>
                                    <td class="title"><?= $row["tanggal"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="4" class="about section ">
                    <div class="container">
                        <div class="section-title">
                            <h2>Rekomendasi Untuk Anda</h2>
                        </div>
                        <table cellpadding="10" cellspacing="0" class="lihat">
                            <tr class="name">
                                <th class="no">No.</th>
                                <th>title</th>
                                <th>content</th>
                                <th>link</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($recommendations as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no width"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="no"><?= $row["waktu"]; ?></td>
                                    <td class="title"><?= $row["tanggal"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
            </div>
        </div>
    </div>



    <script src="https://kit.fontawesome.com/49181759c3.js" crossorigin="anonymou"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="asset/js/nav.js"></script>
</body>

</html>