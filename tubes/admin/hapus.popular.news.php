<?php
session_start();
require 'functions.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
            <script> 
                alert('data berhasil dihapus!;');
                document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script> 
                alert('data gagal ditambahkan!;');
                document.location.href = 'index.php';
            </script>
        ";
}
