<?php
session_start();
require 'functions.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$popular = query("SELECT * FROM news WHERE id = $id")[0];;


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script> 
                alert('data berhasil diubah!;');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script> 
                alert('data gagal diubah!;');
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
            <a href="asset/tampilan/tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah
                        Data</span></i></a>
        </li>
        <li>
            <a href="../../tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus
                        Data</span></i></a>
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
    <div id="about" class="about section">
        <div class="container">
            <div class="section-title">
                <h2>Ubah Popular News</h2>
            </div>
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $news["id"]; ?>">
                    <input type="hidden" name="gambar" value="<?= $news["gambar"]; ?>">
                    <ul>
                        <li>
                            <label for="title">title :</label>
                            <input type="text" name="title" id="title" value="<?= $news["tittle"]; ?>">
                        </li>
                        <li>
                            <label for="content">content :</label>
                            <input type="text" name="content" id="content" value="<?= $news["content"]; ?>">
                        </li>
                        <li>
                            <label for="link">link :</label>
                            <input type="text" name="link" id="link" value="<?= $news["link"]; ?>">
                        </li>
                        <li>
                            <label for="gambar">gambar :</label>
                            <img src="img/<?= $news['gambar']; ?>" width="40" alt="">
                            <input type="file" name="gambar" id="gambar">
                        </li>
                        <li>
                            <button type="submit" name="submit">ubah Data!</button>
                        </li>
                    </ul>

                </form>
            </div>
        </div>

    </div>
</div>



<?php require('partials/footer.php') ?>