<?php
require 'functions.php';

$name = 'Tambah Data Mahasiswa';

// ketika tombol submit di-klik
if (isset($_POST['tambah'])) {
    // ambil data dari form lalu tambah ke tabel mahasiswa
    // cek apakah tambah data berhasil
    if (tambah($_POST) > 0) {
        echo "<script> 
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>";
    }
}
// ambil data dari form lalu tambah ke tabel mahasiswa

require 'views/tambah.view.php';