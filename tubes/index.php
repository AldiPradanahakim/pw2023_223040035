<?php
require 'admin/functions.php';

$news = query("SELECT *
FROM news
JOIN kategori ON news.kategori_id = kategori.id
WHERE kategori = 'latest_news';
");

$populars = query("SELECT *
FROM news
JOIN kategori ON news.kategori_id = kategori.id
WHERE kategori = 'berita_terpopuler';
");

$recommendations = query("SELECT *
FROM news
JOIN kategori ON news.kategori_id = kategori.id
WHERE kategori = 'rekomendasi_untuk_anda';
");

$worlds = query("SELECT *
FROM news
JOIN kategori ON news.kategori_id = kategori.id
WHERE kategori = 'world';
");

// search
if (isset($_POST["cari"])) {
    $news = cari($_POST["keyword"]);
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function() {
            $(".slider").bxSlider();
        });
    </script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>ALL News</title>
</head>
<style>
    .search {
        margin: 0 auto;
        padding: 0 auto;
        align-items: center;
        justify-content: center;
        width: 400px;

    }

    .sign {
        border-radius: 5px;
        width: 100px;
        height: 40px;
        align-items: center;
        text-align: center;
        font-size: 20px;
        margin-right: 10px;
    }

    .sign a:hover {
        color: white;
    }

    nav {
        height: 70px;
    }

    footer .kategori {
        padding: 0;
        margin: 0;
    }

    .carousel {
        padding-top: 22px !important;
    }
</style>



<body>
    <div id="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary  fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    ALL NEWS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa-solid fa-bars text-light"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form action="admin/partials/search.php" method="get" class="search d-flex ms-auto my-4" role="search">
                        <input name="keyword" id="keyword" class="search-input form-control me-2 rounded-pill" type="search" placeholder="Cari berita..." aria-label="Search" autofocus autocomplete="off" />
                        <button name="cari" id="tombol-cari" class="search-btn btn btn-light rounded-pill" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <li class="sign">
                        <a href="login.php">sign in</a>
                    </li>
                    <li class="sign">
                        <a href="login.php">sign up</a>
                    </li>
                </div>
            </div>
        </nav>


        <!-- sliders  -->
        <div id="carouselExampleInterval" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="img/drawing.jpg" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/menko airlangga.jpg" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/polres.jpeg" class="d-block w-100" alt="i">
                </div>
            </div>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail" aria-current="true" aria-label="Slide 1" ata-bs-interval="10000">
                    <img src="img/drawing.jpg" class="d-block w-100" alt="">
                </button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail " aria-label="Slide 2" ata-bs-interval="2000">
                    <img src="img/menko airlangga.jpg" class="d-block w-100" alt="">
                </button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail" aria-label="Slide 3">
                    <img src="img/polres.jpeg" class="d-block w-100" alt="">
                </button>
            </div>
        </div>


        <!-- lastest news -->
        <div class="container padd-5 ">
            <div class="row " id="latest_news">
                <div class="section-title pt-4">
                    <h2>LASTEST NEWS</h2>
                </div>
            </div>
            <div class="row">
                <div class=" lastest-news">
                    <?php $i = 1; ?>
                    <?php foreach ($news as $n) : ?>
                        <div class="card mb-3 border-0" style="max-width: 1000px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="admin/img/<?= $n["gambar"]; ?>" class="card-img pt-4" alt="...">
                                </div>
                                <div class=" col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title pt-2"><?= $n["tittle"]; ?></h5>
                                        <p class="card-text"><?= $n["content"]; ?></p>
                                        <div class="pt-4">
                                            <a href="<?= $n["link"]; ?>" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        </div>
                </div>
            </div>
            <hr>

            <!-- sliders vidio -->
            <div class="row" id="popular">
                <div class="section-title pt-4">
                    <h2>Berita Terpopuler</h2>
                </div>
            </div>
            <div class="slider">
                <div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php $i = 1; ?>
                        <?php foreach ($populars as $p) : ?>
                            <div class="col">
                                <div class="card h-100 border-0">
                                    <img src="admin/img/<?= $p["gambar"]; ?>" class="card-img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $p["tittle"]; ?></h5>
                                        <p class="card-text"><?= $p["content"]; ?></p>
                                    </div>
                                    <a href="<?= $p["link"]; ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <hr>

            <!-- world -->
            <div class="container" id="world">
                <div class="row">
                    <div class="section-title pt-4">
                        <h2>WORLD</h2>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-8 world">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php $i = 1; ?>
                            <?php foreach ($worlds as $w) : ?>
                                <div class="col">
                                    <div class="card border-0">
                                        <img src="admin/img/<?= $w["gambar"]; ?>" class="card-img" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $w["tittle"]; ?></h5>
                                            <p class="card-text"><?= $w["content"]; ?></p>
                                            <a href="<?= $w["link"]; ?>" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <!-- REKOMENDASI UNTUK ANDA -->
            <div class="container" id="rekomendasi">
                <div class="row">
                    <div class="section-title">
                        <h2>Rekomendasi Untuk Anda</h2>
                    </div>
                </div>
                <div class="row">
                    <?php $i = 1; ?>
                    <?php foreach ($recommendations as $r) : ?>
                        <div class="col-sm-12 pt-2">
                            <div class="card border-0">
                                <img src="admin/img/<?= $r["gambar"]; ?>" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $r["tittle"]; ?></h5>
                                    <p class="card-text"><?= $r["content"]; ?></p>
                                    <a href="<?= $r["link"] ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="padd-5">
        <div style="height: 3px; width: 100%; background-color: blue;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 pt-2">
                    <h3>ALL News</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1902773276856!2d107.5919273!3d-6.867788699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e71cb76767dd%3A0x56fb391efe22f815!2s24%20E!5e0!3m2!1sid!2sid!4v1685733864647!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-4 pt-2">
                    <h3>Kategori</h3>
                    <div class="row">
                        <div class="col-12 col-md-3 me-4">
                            <ul class="kategori list-unstyled">
                                <li class="mb-2"><a href="#latest_news">Latest News</a></li>
                                <li class="mb-2"><a href="#popular">Berita Populer</a></li>
                                <li class="mb-2"><a href="#world">World</a></li>
                                <li class="mb-2"><a href="#rekomendasi">Rekomendasi</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-3">
                            <ul class="kategori list-unstyled">
                                <li class="mb-2" style="padding-right: 5px;"><a href="https://travel.detik.com/">Travel</a></li>
                                <li class="mb-2" style="padding-right: 5px;"><a href="https://food.detik.com/">Food</a>
                                </li>
                                <li class="mb-2" style="padding-right: 5px;"><a href="https://health.detik.com/">Health</a></li>
                                <li class="mb-2" style="padding-right: 5px;"><a href="https://20.detik.com/">20detik</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pt-2">
                    <h3>Sosial Media</h3>
                    <ul class="social-media">
                        <li><a href="#"><i class="uil uil-instagram"> aldprdnhkm8</i></a></li>
                        <li><a href="#"><i class="uil uil-github-alt"> AldiPradanahakim</i></a></li>
                        <li><a href="#"><i class="uil uil-twitter-alt"> AldiPradanaHak12</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <div class="text-center pt-4">
                        <p class="text-muted" style="font-size: 18px; margin-bottom: 0;"">Copyright &copy; 2023 ALL News All right reserved.</p>
          </div>
        </div>
      </div>
    </div>


  </footer>

            
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                            </script>
                            <script src="https://kit.fontawesome.com/59f11d8874.js" crossorigin="anonymous"></script>
                            <script src=" js/script.js"></script>

</body>

</html>