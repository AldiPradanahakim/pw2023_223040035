<?php
require '../functions.php';
$keyword = $_GET["keyword"];
// Query untuk mencari data pada 4 tabel berdasarkan kata kunci
$query = "SELECT * FROM latest_news
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' OR
                link LIKE '%$keyword%'
                UNION
                SELECT * FROM berita_populer
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' OR
                link LIKE '%$keyword%'
                UNION
                SELECT * FROM world
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' OR
                link LIKE '%$keyword%'
                UNION
                SELECT * FROM rekomendasi_untuk_anda
                WHERE
                title LIKE '%$keyword%' OR
                content LIKE '%$keyword%' OR
                link LIKE '%$keyword%'";

$latest_news = query($query);
$berita_populer = query($query);
$world = query($query);
$rekomendasi_untuk_anda = query($query);

?>

<div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form action="" method="post" class="d-flex search">
                    <input class="form-control me-auto " type="text" placeholder="Search" name="keyword" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
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
    <div class="container padd-5 ">
        <div class="row">
            <div class="section-title pt-4">
                <h2>LASTEST NEWS</h2>
            </div>
        </div>
        <div class="row">
            <div class=" lastest-news">
                <div class="card mb-3 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/bareskrim_dito.jpeg" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title pt-2">Bareskrim Bakal Tetapkan Dito Mahendra</h5>
                                <p class="card-text">Dito Mahendra telah ditetapkan sebagai tersangka atas kepemilikan senjata api ilegal. Sebagian dari senjata yang ditemukan di rumah Dito Mahendra statusnya tidak berizin atau ilegal.</p>
                                <div class="pt-4">
                                    <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                                    <div style="float: right; text-align: right; font-size:30px;">
                                        <i class="uil uil-heart-alt"></i>
                                        <i class="uil uil-bookmark-full"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/kpk.jpeg" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title pt-2">KPK Periksa 3 saksi</h5>
                                <p class="card-text">KPK Periksa 3 saksi pihak swasta dikasus gratifikasi rafael alun, ketiga saksi yang diperiksa masing-masing bernama hirawati, jennawati, Thio Ida. Para saksi memiliki latar belakang dari pihak swasta.</p>
                                <div class="pt-4">
                                    <a href="https://news.detik.com/berita/d-6700000/kpk-periksa-3-saksi-pihak-swasta-di-kasus-gratifikasi-rafael-alun" class="btn btn-primary">Read More</a>
                                    <div style="float: right; text-align: right; font-size:30px;">
                                        <i class="uil uil-heart-alt"></i>
                                        <i class="uil uil-bookmark-full"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/yana_mulyana.jpeg" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8 border-0">
                            <div class="card-body">
                                <h5 class="card-title pt-2">Dua Wali kota bandung dalam pusaran kasus korupsi</h5>
                                <p class="card-text">Wali kota Bandung Yana Mulyana ditetapkan menjadi tersangka dugaan suap proyek Bandung Smart City. Yana menambah daftar orang nomor satu dikota kembang yang ditangkap KPK.</p>
                                <div class="pt-4">
                                    <a href="https://www.detik.com/jabar/hukum-dan-kriminal/d-6675983/dua-wali-kota-bandung-dalam-pusaran-kasus-korupsi" class="btn btn-primary">Read More</a>
                                    <div style="float: right; text-align: right; font-size:30px;">
                                        <i class="uil uil-heart-alt"></i>
                                        <i class="uil uil-bookmark-full"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/catherine-wilson.jpeg" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body">
                                <h5 class="card-title pt-2">Tak ada Damai! Catherine Wilson Mau Pelaku Pencurian di rumahnya jera</h5>
                                <p class="card-text">Catherine Wilson menegaskan tak mau berdamai kepada pencuri uang dollar dan peralatan YouTubenya. Ia ingin kasus ini tetap dijalankan sebagaimana mestinya. Tidak ada damai untuk kasus ini ia ingin pencuri yang merupakan penjaga rumahnya jera karena melanggar pidana.</p>
                                <div class="pt-4">
                                    <a href="https://hot.detik.com/celeb/d-6699563/tak-ada-damai-catherine-wilson-mau-pelaku-pencurian-di-rumahnya-jera" class="btn btn-primary">Read More</a>
                                    <div style="float: right; text-align: right; font-size:30px;">
                                        <i class="uil uil-heart-alt"></i>
                                        <i class="uil uil-bookmark-full"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/maguire.jpeg" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title pt-2">Selain di Lapangan, Maguire disebut akan merepotkan MU di bursa transfer nanti.</h5>
                                <p class="card-text">Harry Maguire lebih banyak mengundang kritik sejak bergabung dengan Manchester United, Bek tengah itu di perkirakan akan merepotkan di bursa transfer nanti. </p>
                                <div class="pt-4">
                                    <a href="https://sport.detik.com/sepakbola/liga-inggris/d-6699844/selain-di-lapangan-maguire-disebut-akan-ngerepotin-mu-di-bursa-transfer" class="btn btn-primary">Read More</a>
                                    <div style="float: right; text-align: right; font-size:30px;">
                                        <i class="uil uil-heart-alt"></i>
                                        <i class="uil uil-bookmark-full"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- sliders vidio -->
    <div class="row">
        <div class="section-title pt-4">
            <h2>Berita Terpopuler</h2>
        </div>
    </div>
    <div class="slider">
        <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="img/drawing.jpg" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <a href="https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- world -->
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>WORLD</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-8 world">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/disney.jpeg" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Disney rilis soundtrack The Little Mermaid versi Halle Bailey</h5>
                                <p class="card-text">Part of Your World pertama kali dirilis pada 1989 untuk soundtrack fil animasi THE LITTLE MERMAID. Lagu ini ditulis liriknya oleh Howard Ashman dengan komposisi yang digubah Alan Menken.</p>
                                <a href="https://hot.detik.com/music/d-6692272/disney-rilis-soundtrack-the-little-mermaid-versi-halle-bailey" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/pangeran-harry-dan-meghan-markle.jpeg" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Adik tiri sebut hubungan Meghan Markle Harry Toksik dan tak sehat</h5>
                                <p class="card-text">Rumah tangga Meghan Markle dan Pangeran Harry kembali diusik. kini iparnya yang merupakna saudari tiri Meghan Markle yaitu Samantha Markle meceritakan aib meraka.</p>
                                <a href="https://hot.detik.com/celeb/d-6694514/adik-tiri-sebut-hubungan-meghan-markle-harry-toksik-dan-tak-sehat" class="btn btn-primary mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/met gala" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Met Gala 2023: Stars gather for event celebrating Karl Lagerfeld</h5>
                                <p class="card-text">The fashion world has gathered in New York City for the annual Met Gala once again - this year themed on the late fashion icon Karl Lagerfeld.</p>
                                <a href="https://www.bbc.com/news/world-us-canada-65452442" class="btn btn-primary mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/singapore" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Commentary: Singapore may not be able to outbid the big players, but it has its own ‘secret recipe’</h5>
                                <p class="card-text">SINGAPORE: At his first outing as keynote speaker at the National Trades Union Congress (NTUC) May Day Rally on Monday (May 1), Deputy Prime Minister and prime minister-in-waiting Lawrence Wong issued.</p>
                                <a href="https://www.channelnewsasia.com/commentary/lawrence-wong-may-day-rally-2023-political-compact-tripartism-leadership-transition-3457156" class="btn btn-primary mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/artificial" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Google AI pioneer says he quit to speak freely about technology's 'dangers'</h5>
                                <p class="card-text">A pioneer of artificial intelligence said he quit Google to speak freely about the technology's dangers, after realising that computers could become smarter than people far sooner than he and other experts had expected.</p>
                                <a href="https://www.channelnewsasia.com/business/google-ai-pioneer-says-he-quit-speak-freely-about-technologys-dangers-3458896" class="btn btn-primary mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="img/hollywood" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Hollywood strike: Screenwriters will walk out for first time in 15 years</h5>
                                <p class="card-text">Thousands of Hollywood TV and movie screenwriters will strike on Tuesday, after last minute talks with major studios over wages broke down. A Writers Guild of America (WGA) strike, the first in 15 years.</p>
                                <a href="https://www.bbc.com/news/entertainment-arts-65447046" class="btn btn-primary mt-5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 mt-5 border-0" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/palestina" class="card-img pt-4" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Palestinian Khader Adnan dies in Israel jail after 86 days on hunger strike</h5>
                                <p class="card-text">A senior figure in the Palestinian militant group Islamic Jihad, Khader Adnan, has died in an Israeli jail after 86 days on hunger strike. Israel Prison Service (IPS) said he was found unconscious early on Tuesday</p>
                                <a href="https://www.bbc.com/news/world-middle-east-65452946" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- REKOMENDASI UNTUK ANDA -->
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Rekomendasi Untuk Anda</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-3 border-0">
                    <img src="img/basket" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LeBron James vs. Steph Curry: Old rivalries reignite as LA Lakers face Golden State Warriors</h5>
                        <p class="card-text">From that very day, the journeys of two of basketball’s all-time greats have been forever intertwined. Now the matchup that dominated basketball in the late 2010s is back again for round five, as the pair square off in the Western Conference semifinals.</p>
                        <a href="https://edition.cnn.com/2023/05/02/sport/lebron-james-steph-curry-lakers-warriors-spt-intl/index.html" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3 border-0" style="max-width: 100%; height: 150px;">
                    <div class="row g-0">
                        <div class="col-md-4 pt-1">
                            <img src="img/ed-sheeran.jpeg" class="card-img pt-3" alt="..." style="height: 140px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">Ed Sheeran says allegations in copyright infringement trial are ‘really insulting’</p>
                                <a href="https://edition.cnn.com/2023/05/01/media/ed-sheeran-trial-week-two/index.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 100%; height: 150px;">
                    <div class="row g-0">
                        <div class="col-md-4 pt-1">
                            <img src="img/bbc.jpg" class="card-img pt-3" alt="..." style="height: 140px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">BBC chairman resigns after controversy involving loan deal for former PM Boris Johnson</p>
                                <a href="https://edition.cnn.com/2023/04/28/media/bbc-sharp-resigns-intl-gbr/index.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 100%; height: 150px;">
                    <div class="row g-0">
                        <div class="col-md-4 pt-1">
                            <img src="img/carlos.jpg" class="card-img pt--3" alt="..." style="height: 140px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">Carlos Alcaraz eyes tournament success and world No. 1 spot after returning from injury</p>
                                <a href="https://edition.cnn.com/2023/03/17/tennis/carlos-alcaraz-indian-wells-injury-return-spt-intl/index.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0" style="max-width: 100%; height: 150px;">
                    <div class="row g-0">
                        <div class="col-md-4 pt-1">
                            <img src="img/kasatkina.jpg" class="card-img pt-3" alt="..." style="height: 140px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">Russia’s Daria Kasatkina says it ‘makes a lot of sense’ for Ukrainian tennis players to receive support during grass-court season</p>
                                <a href="https://edition.cnn.com/2023/05/01/tennis/daria-kasatkina-ukraine-tennis-players-spt-intl/index.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script></script>
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</div>

<!-- footer -->
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
                    <div class="col-12 col-md-3">
                        <ul class="kategori list-unstyled">
                            <li class="mb-2"><a href="">News</a></li>
                            <li class="mb-2"><a href="">News</a></li>
                            <li class="mb-2"><a href="">News</a></li>
                            <li class="mb-2"><a href="">News</a></li>
                            <li class="mb-2"><a href="">News</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3">
                        <ul class="kategori list-unstyled">
                            <li class="mb-2" style="padding-right: 5px;"><a href="">News</a></li>
                            <li class="mb-2" style="padding-right: 5px;"><a href="">News</a></li>
                            <li class="mb-2" style="padding-right: 5px;"><a href="">News</a></li>
                            <li class="mb-2" style="padding-right: 5px;"><a href="">News</a></li>
                            <li class="mb-2" style="padding-right: 5px;"><a href="">News</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h3>Sosial Media</h3>
                <ul class="social-media">
                    <li><a href="#"><i class="uil uil-instagram"> aldprdnhkm8</i></a></li>
                    <li><a href="#"><i class="uil uil-github-alt"> AldiPradanahakim</i></a></li>
                    <li><a href="#"><i class="uil uil-twitter-alt"></i></a></li>
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