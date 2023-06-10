<?php
session_start();
require 'admin/functions.php';

if (empty($_SESSION["login"])) {
  header("Location: login.php");
  exit();
}

$news = query("SELECT * FROM latest_news");
$populars = query("SELECT * FROM berita_terpopuler");
$recommendations = query("SELECT * FROM rekomendasi_untuk_anda");
$worlds = query("SELECT * FROM world");

// Mendapatkan user_id dari session
$user_id = $_SESSION["user_id"];


//ambil data user berdasarkan user_id
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);





// tombol cari ditekan
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fm1DrjrMo+7Xr21Epl+Y5kDCq9hF5efWjIOgbZIz3BX66lg39loTSPBUVrFTC0mI/3HTzLJqmcC8NebihozBrA==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <title>ALL NEWS</title>
</head>
<style>
  .search {
    margin: 0 auto;
    padding: 0 auto;
    align-items: center;
    justify-content: center;
    width: 400px;

  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    right: 0;
  }

  .dropdown img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .dropdown-content .name {
    display: flex;
  }

  .dropdown-content img {
    width: 90px;
    height: 80px;
    border-radius: 50%;
    margin-right: 10px;
    overflow: hidden;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>



<body>
  <div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ALL News</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form action="admin/partials/search.login.php" class="d-flex search">
            <input class="form-control me-auto " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
          </form>
        </div>
        <li>
          <div class="dropdown">
            <span><img src="img/profile.jpg" alt=""></span>
            <div class="dropdown-content">
              <ul>
                <li class="name">
                  <img src="img/profile.jpg" alt="">
                  <p>username : <?= $user["username"]; ?></p>
                </li>
                <li>
                  <p>nama : <?= $user['nama']; ?></p>
                  <p>email : <?= $user['email']; ?></p>
                </li>
                <li>
                  <hr>
                </li>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

    </nav>

    <!-- sliders  -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
          <img src="img/drawing.jpg" class="d-block w-100" alt="">
        </button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail" aria-label="Slide 3">
          <img src="img/drawing.jpg" class="d-block w-100" alt="">
        </button>
      </div>
    </div>


    <!-- lastest news -->
    <div class="container padd-5 " id="latest_news">
      <div class="row">
        <div class="section-title pt-4">
          <h2>LASTEST NEWS</h2>
        </div>
      </div>
      <div class="row">
        <div class=" lastest-news">
          <?php $i = 1; ?>
          <?php foreach ($news as $row) : ?>
            <div class="card mb-3 border-0" style="max-width: 1000px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="admin/img/<?= $row["gambar"]; ?>" class="card-img pt-4" alt="...">
                </div>
                <div class=" col-md-8">
                  <div class="card-body">
                    <h5 class="card-title pt-2"><?= $row["title"]; ?></h5>
                    <p class="card-text"><?= $row["content"]; ?></p>
                    <div class="pt-4">
                      <a href="<?= $row["link"]; ?>" class="btn btn-primary">Read More</a>

                    </div>
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
          <?php foreach ($populars as $row) : ?>
            <div class="col">
              <div class="card h-100 border-0">
                <img src="admin/img/<?= $row["gambar"]; ?>" class="card-img" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $row["title"]; ?></h5>
                  <p class="card-text"><?= $row["content"]; ?></p>
                </div>
                <a href="<?= $row["link"]; ?>" class="btn btn-primary">Read More</a>
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
        <div class="section-title">
          <h2>WORLD</h2>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-8 world">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php $i = 1; ?>
            <?php foreach ($worlds as $row) : ?>
              <div class="col">
                <div class="card border-0">
                  <img src="admin/img/<?= $row["gambar"]; ?>" class="card-img" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $row["title"]; ?></h5>
                    <p class="card-text"><?= $row["content"]; ?></p>
                    <a href="<?= $row["link"]; ?>" class="btn btn-primary">Read More</a>
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
        <?php foreach ($recommendations as $row) : ?>
          <div class="col-sm-12 pt-2">
            <div class="card border-0">
              <img src="admin/img/<?= $row["gambar"]; ?>" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $row["title"]; ?></h5>
                <p class="card-text"><?= $row["content"]; ?></p>
                <a href="<?= $row["link"] ?>" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
          <?php $i++; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <footer class="padd-5">
    <div style="height: 3px; background-color: blue;"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>Titik News</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1902773276856!2d107.5919273!3d-6.867788699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e71cb76767dd%3A0x56fb391efe22f815!2s24%20E!5e0!3m2!1sid!2sid!4v1685733864647!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-4">
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
                <li class="mb-2" style="padding-right: 5px;"><a href="https://food.detik.com/">Food</a></li>
                <li class="mb-2" style="padding-right: 5px;"><a href="https://health.detik.com/">Health</a></li>
                <li class="mb-2" style="padding-right: 5px;"><a href="https://20.detik.com/">20detik</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-3">
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
            <p class="text-muted" style="font-size: 18px; margin-bottom: 0;"">Copyright &copy; 2023 Titik News All right reserved.</p>
          </div>
        </div>
      </div>
    </div>


  </footer>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
              </script>
              <script></script>
              <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
              <!-- Option 2: Separate Popper and Bootstrap JS -->
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


              <script>
                // Mengaktifkan dropdown ketika diklik di luar dropdown content
                window.onclick = function(event) {
                  if (!event.target.matches('.dropdown')) {
                    var dropdowns = document.getElementsByClassName(" dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                      var openDropdown = dropdowns[i];
                      if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                      }
                    }
                  }
                }
              </script>

              <!-- Option 1: Bootstrap Bundle with Popper -->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
              <script></script>
              <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
              <!-- Option 2: Separate Popper and Bootstrap JS -->
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
              <script src="admin/asset/js/nav.js"></script>

</body>

</html>