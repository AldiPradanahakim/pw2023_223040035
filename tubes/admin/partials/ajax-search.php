<?php
require '../functions.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
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

    // Jika hasil pencarian kosong
    if (count($news) == 0) {
        echo '<h3 class="pesan text-center mt-5">"Berita tidak tersedia"</h3>';
    } else {
        foreach ($news as $n) {
            echo '
            <div class="card mb-3 border-0" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../img/' . $n["gambar"] . '" class="card-img pt-4" alt="...">
                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h5 class="card-title pt-2">' . $n["title"] . '</h5>
                            <p class="card-text">' . $n["content"] . '</p>
                            <div class="pt-4">
                                <a href="' . $n["link"] . '" class="btn btn-primary">Read More</a>
                                <div style="float: right; text-align: right; font-size:30px;">
                                    <i type="submit" name="save_btn" class="uil uil-bookmark-full"></i>
                                    <i type="submit" name="like_btn" class="uil uil-heart-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
}
