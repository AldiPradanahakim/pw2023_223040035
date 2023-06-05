<?php
require '../functions.php';
$keyword = $_GET["keyword"];

// Query untuk mencari data pada 4 tabel berdasarkan kata kunci
$query = "SELECT title, content, link, gambar FROM latest_news
            WHERE
            title LIKE '%$keyword%' OR
            content LIKE '%$keyword%' 
            UNION
            SELECT title, '', '', '' FROM berita_terpopuler
            WHERE
            title LIKE '%$keyword%'
            UNION
            SELECT title, content, link, gambar FROM world
            WHERE
            title LIKE '%$keyword%' OR
            content LIKE '%$keyword%'
            UNION
            SELECT title, content, link, gambar FROM rekomendasi_untuk_anda
            WHERE
            title LIKE '%$keyword%' OR
            content LIKE '%$keyword%' ";

$news = query($query);
$populars = query("SELECT title FROM berita_terpopuler WHERE title LIKE '%$keyword%'");
$worlds = query("SELECT title, content, link, gambar FROM world WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'");
$recommendations = query("SELECT title, content, link, gambar FROM rekomendasi_untuk_anda WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="css/color-1.css" />
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
                        <a href="#">Submenu 1</a>
                        <a href="#">Submenu 2</a>
                        <a href="#">Submenu 3</a>
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
                        <form action="" method="post">
                            <input type="text" name="keyword" class="search-txt" autofocus placeholder="Search.." autocomplete="off" id="keyword">
                            <i class="uil uil-search" name="cari" id="tombol-cari"></i>
                        </form>
                    </div>
                </div>
                <section id="latest" class="about section">
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

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($news as $row) : ?>
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
                <section id="popular" class="about section">
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
                <section id="world" class="about section">
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

    <script src="js/nav.js"></script>
</body>

</html><?php
        require '../functions.php';
        $keyword = $_GET["keyword"];

        // Query untuk mencari data pada 4 tabel berdasarkan kata kunci
        $query = "SELECT title FROM latest_news
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' 
                UNION
                SELECT title FROM berita_terpopuler
                WHERE
                title LIKE '%$keyword%'
                UNION
                SELECT title FROM world
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%'
                UNION
                SELECT title FROM rekomendasi_untuk_anda
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' ";

        $news = query($query);
        $populars = query($query);
        $worlds = query($query);
        $recommendations = query($query);

        // var_dump

        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="css/color-1.css" />
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
                        <a href="#">Submenu 1</a>
                        <a href="#">Submenu 2</a>
                        <a href="#">Submenu 3</a>
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
                        <form action="" method="post">
                            <input type="text" name="keyword" class="search-txt" autofocus placeholder="Search.." autocomplete="off" id="keyword">
                            <i class="uil uil-search" name="cari" id="tombol-cari"></i>
                        </form>
                    </div>
                </div>
                <section id="latest" class="about section">
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

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($news as $row) : ?>
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
                <section id="popular" class="about section">
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
                <section id="world" class="about section">
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

    <script src="js/nav.js"></script>
</body>

</html>