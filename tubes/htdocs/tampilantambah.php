<?php
session_start();
require('functions.php');

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script> 
            alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
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

<body>
    <div class="main-container">
        <div class="aside">
            <div class="logo">
                <a href="index.php"><span>ALL</span></a>
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <ul class="nav">
                <li>
                    <a href="tampilantambah.php" class="active"><i class="uil uil-plus"><span>Tambah
                                Data</span></i></a>
                </li>
                <li>
                    <a href="asset/tampilan/tampilanhapus.php" class="active"><i class="uil uil-trash-alt"><span>Hapus
                                Data</span></i></a>
                </li>
                <li>
                    <a href="asset/tampilan/tampilanubah.php" class="active"><i class="uil uil-edit"><span>Edit</span></i></a>
                </li>
                <li>
                    <a href="lihat.php" class="active"><i class="uil uil-eye"><span>lihat</span></i></a>
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
                    <div class="section-title">
                        <h2>Tambah Berita</h2>
                    </div>
                    <div class="row">
                        <form action="" method="post" enctype="multipart/form-data" class="left-form">
                            <ul>
                                <li>
                                    <label for="tittle">Tittle</label>
                                    <input type="text" name="tittle" id="title" />
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
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori">
                                        <option value="">Pilih berdasarkan kategori</option>
                                        <option value="1">Popular</option>
                                        <option value="2">Latest</option>
                                        <option value="3">FYP</option>
                                        <option value="4">World</option>
                                    </select>
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

        <script src="https://kit.fontawesome.com/49181759c3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <script src="asset/js/nav.js"></script>
</body>

</html>