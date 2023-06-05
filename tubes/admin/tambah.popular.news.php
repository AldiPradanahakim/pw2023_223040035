<?php
require 'functions.php';


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambahpopular($_POST) > 0) {
        echo "
            <script> 
                alert('data berhasil ditambahkan!;');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script> 
                alert('data berhasil ditambahkan!;');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<?php require('partials/header.php') ?>

<div class="aside">
    <div class="logo">
        <a href="https://instagram.com/aldprdnhkm8/"><span>Titik</span></a>
    </div>
    <div class="nav-toggler">
        <span></span>
    </div>
    <ul class="nav">
        <li>
            <a href="asset/tampilan/tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah Data</span></i></a>
        </li>
        <li>
            <a href="../../tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus Data</span></i></a>
        </li>
        <li>
            <a href="../../tampilan/tampilanubah.php" class="active"><i class="uil uil-edit"><span>Edit</span></i></a>
        </li>
        <li>
            <a href="lihat.php" class="active"><i class="uil uil-eye"><span>lihat</span></i></a>
        </li>

        <!-- <i class="uil uil-times" onclick="tutup()"></i> -->
    </ul>

    <!-- <i class="uil uil-bars" onclick="buka()"></i> -->
</div>

<div class="main-content">
    <section id="about" class="about section">
        <div class="container">
            <div class="section-title">
                <h2>Tambah Popular News</h2>
            </div>
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data" class="left-form">
                    <ul>
                        <li>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" />
                        </li>
                        <li>
                            <label for="content">Content</label>
                            <input type="text" name="content" id="content" />
                        </li>
                        <li>
                            <label for="link">Link</label>
                            <input type="text" name="link" id="link" />
                        </li>
                        <li>
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" />
                        </li>
                        <li>
                            <button type="submit" name="submit">Tambah Data!</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require('partials/header.php') ?>