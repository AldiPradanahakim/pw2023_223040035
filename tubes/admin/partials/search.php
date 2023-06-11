<?php
require '../functions.php';

// Mendapatkan nilai keyword dari input pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query tampil barang
$news = query("SELECT * FROM news");

// Jika terdapat parameter "cari" dan input pencarian tidak kosong
if (isset($_GET['cari']) && !empty($keyword)) {
    $news = query("SELECT * FROM news JOIN kategori ON news.kategori_id = kategori.id WHERE content LIKE '%keyword%' OR tittle LIKE '%keyword%'");
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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
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

    .like-icon {
        color: gray;
        cursor: pointer;
    }

    .like-icon.active {
        color: red;
    }

    footer .kategori {
        padding: 0;
        margin: 0;
    }

    nav {
        height: 70px;
    }
</style>


<body>
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
                    <a href="../../login.php">sign in</a>
                </li>
                <li class="sign">
                    <a href="../../login.php">sign up</a>
                </li>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>