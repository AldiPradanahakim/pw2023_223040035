<?php
session_start();
require('../../functions.php');

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../../../login.php");
    exit();
}
$recommendations = query("SELECT * FROM rekomendasi_untuk_anda");
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
        <div class="section">
            <section id="about" class="about section">
                <div class="container">
                    <div class="section-title">
                        <h2>Ubah Rekomendasi Untuk Anda</h2>
                    </div>
                    <table cellpadding="10" cellspacing="0">
                        <tr class="name">
                            <th class="no">No.</th>
                            <th>title</th>
                            <th>content</th>
                            <th>link</th>
                            <th>Gambar</th>
                            <th>Waktu</th>
                            <th>tanggal</th>
                            <th class="no">Aksi</th>

                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($recommendations as $row) : ?>
                            <tr class="isi">
                                <td class="no"><?= $i; ?></td>
                                <td><?= $row["title"]; ?></td>
                                <td><?= $row["content"]; ?></td>
                                <td><?= $row["link"]; ?></td>
                                <td class="gambar padding"><img src="../../img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>
                                <td class="padding waktu"><?= $row["waktu"]; ?></td>
                                <td class="padding waktu"><?= $row["tanggal"]; ?></td>
                                <td class="uil">
                                    <a href="../../ubah.rekomendasi.php?recommendation_id=<?= $row["recommendation_id"]; ?>"><i class="uil uil-edit"></i></a>
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