<?php
session_start();
require('../../functions.php');

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../../../login.php");
    exit();
}

$news = query("SELECT n.*,k.*, n.id as id_berita
              FROM news n
              JOIN kategori k ON n.kategori_id = k.id
              WHERE kategori = 'latest_news'");


?>

<?php require('../../partials/header.php'); ?>
<div class="main-container">
    <div class="aside">
        <div class="logo">
            <a href="../../index.php"><span>ALL</span></a>
        </div>
        <div class="nav-toggler">
            <span></span>
        </div>
        <ul class="nav">
            <li>
                <a href="../../tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah
                            Data</span></i></a>
            </li>
            <li>
                <a href="../tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus
                            Data</span></i></a>
            </li>
            <li>
                <a href="../tampilan/tampilanubah.php" class="active"><i class="uil uil-edit"><span>Edit</span></i></a>
            </li>
            <li>
                <a href="../../lihat.php" class="active"><i class="uil uil-eye"><span>lihat</span></i></a>
            </li>
            <li>
                <a href="../../../logout.php"><i class="uil uil-sign-out-alt"><span>Log Out</span></i></a>
            </li>

            <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
        </ul>

        <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
    </div>

    <div class="main-content">
        <div class="section">
            <section id="about" class="about section">
                <div class="container">
                    <div class="section-title">
                        <h2>Hapus Lates News</h2>
                    </div>
                    <table cellpadding="10" cellspacing="0">
                        <tr class="name">
                            <th class="no">No.</th>
                            <th>title</th>
                            <th>content</th>
                            <th>link</th>
                            <th>Gambar</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th class="no">Aksi</th>


                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($news as $row) : ?>
                            <tr class="isi">
                                <td class="no"><?= $i; ?></td>
                                <td class="padding"><?= $row["tittle"]; ?></td>
                                <td class="padding"><?= $row["content"]; ?></td>
                                <td class="padding"><?= $row["link"]; ?></td>
                                <td class="padding gambar"><img src="../../img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>
                                <td class="padding waktu"><?= $row["waktu"]; ?></td>
                                <td class="padding waktu"><?= $row["tanggal"]; ?></td>
                                <td class="uil">
                                    <a href="../../hapus.latest.news.php?id=<?= $row["id_berita"]; ?>" onclick="return confirm('yakin?')"><i class="uil uil-times-circle"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </section>
        </div>
    </div>
</div>

<?php require('../../partials/footer.php'); ?>