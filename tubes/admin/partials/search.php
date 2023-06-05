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

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>Titik.News</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Titik.News</a>
            <form class="d-flex" method="get" role="search">
                <input name="keyword" class="form-control me-auto" type="search" placeholder="Search" aria-label="Search" width="500">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
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