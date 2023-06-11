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

// HAPUS ATAU DELET
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM news WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// UBAH ATAU UPDATE
function ubah($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $id = ($data["id"]);
    $tittle = htmlspecialchars($data["tittle"]);
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
    $query = "UPDATE news SET
            tittle = '$tittle',
            content = '$content',
            link = '$link',
            gambar = '$gambar'
            WHERE id = $id
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

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $tittle = htmlspecialchars($data['tittle']);
    $link = htmlspecialchars($data['link']);
    $content = htmlspecialchars($data['content']);
    $kategori_id = htmlspecialchars($data['kategori_id']);


    // UP GAMBAR
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // INSERT DATA 
    $query = "INSERT INTO news (tittle, content, link, gambar, waktu, tanggal, kategori_id)
    VALUES ('$tittle', '$content', '$link', '$gambar', CURRENT_TIMESTAMP,  CURDATE(), '$kategori_id')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    //cek apakah tidak ada gambar yang di upload
    $error = $_FILES['gambar']['error'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
    alert('Pilih gambar terlebih dahulu')
    </script>";
        return false;
    }

    // CEK VALIDASI GAMBAR
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }

    // CEK SIZE GAMBAR 
    if ($ukuranfile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    // LOLOS CEK, SIAP UPLOAD
    // GENERATE NEW NAME
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, 'img/' . $namafilebaru);

    return $namafilebaru;
}
