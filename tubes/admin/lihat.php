<?php
require 'functions.php';
$news = query("SELECT * FROM latest_news");
$populars = query("SELECT * FROM berita_terpopuler");
$recommendations = query("SELECT * FROM rekomendasi_untuk_anda");
$worlds = query("SELECT * FROM world");



if (isset($_POST["cari"])) {
    $news = cari($_POST["keyword"]);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
    <link rel="stylesheet" href="asset/css/admin.css" />
    <link rel="stylesheet" href="asset/css/color-1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>

    <div class="main-container" id="container">
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
                    <a href="#" onclick="toggleDropdown('dropdown1')">Menu 1</a>
                </li>
                <li>
                    <div class="dropdown-content" id="dropdown1">
                        <a href="#1">Submenu 1</a>
                        <a href="#2">Submenu 1</a>
                        <a href="#3">Submenu 3</a>
                    </div>
                </li>
                <li>

                </li>

                <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
            </ul>

            <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
        </div>

        <div class="main-content">
            <div class="section">
                <div class="bodi">
                    <div class="box">
                        <input type="text" name="keyword" class="search-txt" autofocus placeholder="Search.." autocomplete="off" id="keyword">
                        <i class="uil uil-search" name="cari" id="tombol-cari"></i>
                    </div>
                </div>
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
                                <th>Gambar</th>
                                <th>Waktu</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($news as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>
                                    <td><?= $row["waktu"]; ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="2" class="about section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Berita Terpopuler</h2>
                        </div>
                        <table cellpadding="10" cellspacing="0" class="lihat">
                            <tr class="name">
                                <th class="no">No.</th>
                                <th>title</th>>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($populars as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title title-popular"><?= $row["title"]; ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="3" class="about section">
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
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($worlds as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
                                    <td class="gambar no"><img src="img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </section>
                <section id="rekomendasi" class="about section">
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
                                <th>Gambar</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($recommendations as $row) : ?>
                                <tr class="isi">
                                    <td class="no"><?= $i; ?></td>
                                    <td class="title"><?= $row["title"]; ?></td>
                                    <td class="no"><?= $row["content"]; ?></td>
                                    <td class="title"><?= $row["link"]; ?></td>
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

    <script src="asset/js/nav.js"></script>
</body>

</html>