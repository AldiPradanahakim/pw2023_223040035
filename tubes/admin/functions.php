<?php

define('BASE_URL', '/pw2023_223040035/tubes/');

// koneksi ke darabase
$conn = mysqli_connect("localhost", "root", "", "titik_news");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// TAMBAH ATAU CREATE
function tambahnews($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query insert data
    $query = "INSERT INTO latest_news
                VALUES 
                (null, '$title', '$content', '$link', '$gambar', CURRENT_TIMESTAMP,  CURDATE())";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function tambahpopular($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query insert data
    $query = "INSERT INTO berita_terpopuler
                VALUES 
                (null, '$title', '$content', '$link', '$gambar',CURRENT_TIMESTAMP,  CURDATE())";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function tambahrekomendasi($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query insert data
    $query = "INSERT INTO rekomendasi_untuk_anda
                VALUES 
                (null, '$title', '$content', '$link', '$gambar',CURRENT_TIMESTAMP,  CURDATE())";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function tambahworld($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query insert data
    $query = "INSERT INTO world
                VALUES 
                (null, '$title', '$content', '$link', '$gambar', CURRENT_TIMESTAMP,  CURDATE())";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function upload()
{
    // ambil nama file gambar
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $eror = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($eror == 4) {
        echo "<script>
                alert('Gambar tidak ditemukan!');
                </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Ekstensi gambar tidak sesuai!');
                </script>";
    }

    // cek jika ukurannya terlalu besar 
    if ($ukuranFile > 2000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


// HAPUS ATAU DELET
function hapusnews($news_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM latest_news WHERE news_id = $news_id");

    return mysqli_affected_rows($conn);
}

function hapuspopular($popular_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM berita_terpopuler WHERE popular_id = $popular_id");

    return mysqli_affected_rows($conn);
}

function hapusrekomendasi($recommendation_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM rekomendasi_untuk_anda WHERE recommendation_id = $recommendation_id");

    return mysqli_affected_rows($conn);
}

function hapusworld($world_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM world WHERE world_id = $world_id");

    return mysqli_affected_rows($conn);
}


// UBAH ATAU UPDATE
function ubahnews($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $news_id = ($data["news_id"]);
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    // query insert data
    $query = "UPDATE  latest_news SET
            title = '$title',
            content = '$content',
            link = '$link',
            gambar = '$gambar'
            WHERE news_id = $news_id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahpopular($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $popular_id = ($data["popular_id"]);
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // cek apakah user pilih gambar baru atau tidak

    // query insert data
    $query = "UPDATE  latest_news SET
            title = '$title',
            content = '$content',
            link = '$link',
            gambar = '$gambar'
            WHERE popular_id = $popular_id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahrekomendasi($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $recommendation_id = ($data["recommendation_id"]);
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    // query insert data
    $query = "UPDATE  rekomendasi_untuk_anda SET
            title = '$title',
            content = '$content',
            link = '$link',
            gambar = '$gambar'
            WHERE recommendation_id = $recommendation_id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahworld($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $world_id = ($data["world_id"]);
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $link = htmlspecialchars($data["link"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE  world SET
            title = '$title',
            content = '$content',
            link = '$link',
            gambar = '$gambar'
            WHERE world_id = $world_id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    // Query untuk mencari data pada 4 tabel berdasarkan kata kunci
    $query = "SELECT title FROM latest_news
    WHERE
    title LIKE '%$keyword%' OR
    content LIKE '%$keyword%' 
    UNION
    SELECT title FROM berita_terpopuler
    WHERE
    title LIKE '%$keyword%'
    UNION
    SELECT title FROM world
    WHERE
    title LIKE '%$keyword%' OR
    content LIKE '%$keyword%'
    UNION
    SELECT title FROM rekomendasi_untuk_anda
    WHERE
    title LIKE '%$keyword%' OR
    content LIKE '%$keyword%' ";

    return query($query);
}


function registrasi($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password != $password2) {
        echo "<script>
            alert('Password tidak sama');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO users VALUES(null, '$username', '$nama', '$email', '$password', 'user')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
