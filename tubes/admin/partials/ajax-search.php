<?php
require '../functions.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $news = query("SELECT * FROM news JOIN kategori ON news.kategori_id = kategori.id WHERE content LIKE '%$keyword%' OR
tittle LIKE '%$keyword%';");
}

// Jika hasil pencarian kosong
if (count($news) == 0) {
    echo '<h3 class="pesan text-center pt-5">"Berita tidak tersedia"</h3>';
} else {
    foreach ($news as $n) {
        echo '
<div class="card mb-3 mt-5 border-0" style="max-width: 1000px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="../img/' . $n["gambar"] . '" class="card-img pt-4" alt="...">
                </div>
                <div class=" col-md-8">
                    <div class="card-body">
                        <h5 class="card-title pt-2">' . $n["tittle"] . '</h5>
                        <p class="card-text">' . $n["content"] . '</p>
                        <div class="pt-4">
                            <a href="' . $n["link"] . '" class="btn btn-primary">Read More</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}
