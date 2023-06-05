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
                        <h2>Hapus Berita Terpopuler</h2>
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
                        <?php foreach ($populars as $row) : ?>
                            <tr class="isi">
                                <td class="no"><?= $i; ?></td>
                                <td class="padding"><?= $row["title"]; ?></td>
                                <td class="padding"><?= $row["content"]; ?></td>
                                <td class="padding"><?= $row["link"]; ?></td>
                                <td class="padding gambar"><img src="../../img/<?= $row["gambar"]; ?>" alt="" width="120" height="60"></td>
                                <td class="padding waktu"><?= $row["waktu"]; ?></td>
                                <td class="padding waktu"><?= $row["tanggal"]; ?></td>
                                <td class="uil">
                                    <a href="../../hapus.latest.news.php?news_id=<?= $row["news_id"]; ?>" onclick="return confirm('yakin?')"><i class="uil uil-times-circle"></i></a>
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