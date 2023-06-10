<?php
require '../functions.php';


// Mendapatkan nilai keyword dari input pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query tampil barang
$news = query("SELECT * FROM latest_news");

// Jika terdapat parameter "cari" dan input pencarian tidak kosong
if (isset($_GET['cari']) && !empty($keyword)) {
    $news = query("SELECT ln.*
    FROM latest_news ln
    WHERE ln.title LIKE '%$keyword%' OR ln.content LIKE '%$keyword%'
    UNION
    SELECT w.*
    FROM world w
    WHERE w.title LIKE '%$keyword%' OR w.content LIKE '%$keyword%'
    UNION
    SELECT ra.*
    FROM rekomendasi_untuk_anda ra
    WHERE ra.title LIKE '%$keyword%' OR ra.content LIKE '%$keyword%'
    UNION
    SELECT bt.*
    FROM berita_terpopuler bt
    WHERE bt.title LIKE '%$keyword%' OR bt.content LIKE '%$keyword%';
    ");
}

$users = query("SELECT * FROM users LIMIT 1");

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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
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

    footer .kategori {
        padding: 0;
        margin: 0;
    }
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ALL News</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex search">
                    <input class="form-control me-auto " type="search" placeholder="Search" name="keyword" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
            </div>
            <?php foreach ($users as $row) : ?>
                <li>
                    <div class="dropdown">
                        <span><img src="../../img/profile.jpg" alt=""></span>
                        <div class="dropdown-content">
                            <ul>
                                <li class="name">
                                    <img src="../../img/profile.jpg" alt="">
                                    <p>username : <?= $row["username"]; ?></p>
                                </li>
                                <li>
                                    <p>nama : <?= $row["nama"]; ?></p>
                                    <p>email : <?= $row["email"]; ?></p>
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
            <?php endforeach; ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div id="search-results">

    </div>



    <script>
        // Ambil elemen input pencarian
        const searchInput = document.querySelector('input[name="keyword"]');
        const searchResultsContainer = document.getElementById("search-results");

        // Tambahkan event listener untuk input pencarian
        searchInput.addEventListener("input", function() {
            // Ambil nilai input pencarian
            const keyword = this.value.trim();

            // Buat request AJAX ke server untuk mendapatkan hasil pencarian
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `ajax-search.php?keyword=${encodeURIComponent(keyword)}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Tangkap hasil pencarian dari server
                    const searchResults = xhr.responseText;

                    // Tampilkan hasil pencarian di elemen search-results
                    searchResultsContainer.innerHTML = searchResults;
                }
            };
            xhr.send();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>