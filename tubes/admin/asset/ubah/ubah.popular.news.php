<?php
require('../../functions.php');
$populars = query("SELECT * FROM berita_terpopuler ");
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
            <section id="about" class="about section">
                <div class="container">
                    <div class="section-title">
                        <h2>Ubah Berita Terpopuler</h2>
                    </div>
                    <table cellpadding="10" cellspacing="0">
                        <tr class="name">
                            <th class="no">No.</th>
                            <th>title</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th class="no">Aksi</th>

                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($populars as $row) : ?>
                            <tr class="isi">
                                <td class="no"><?= $i; ?></td>
                                <td><?= $row["title"]; ?></td>
                                <td class="padding waktu"><?= $row["waktu"]; ?></td>
                                <td class="padding waktu"><?= $row["tanggal"]; ?></td>
                                <td class="uil">
                                    <a href="../../ubah.popular.php?popular_id=<?= $row["popular_id"]; ?>"><i class="uil uil-edit"></i></a>
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