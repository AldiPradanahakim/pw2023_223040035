<?php
require 'functions.php';

$name = 'Ubah Data Mahasiswa';
$id = htmlspecialchars($_GET['id']);
$student = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// ketika tombol submit di-klik
if (isset($_POST['ubah'])) {
    // ambil data dari form lalu tambah ke tabel mahasiswa
    // cek apakah tambah data berhasil
    if (ubah($_POST) > 0) {
        echo "<script> 
            alert('data berhasil di ubah!');
            document.location.href = 'index.php';
            </script>";
    }
}
// ambil data dari form lalu tambah ke tabel mahasiswa

require 'views/ubah.view.php';
