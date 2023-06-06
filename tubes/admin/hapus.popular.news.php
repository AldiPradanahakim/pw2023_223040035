<?php
session_start();
require 'functions.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
$popular_id = $_GET["popular_id"];

if (hapuspopular($popular_id) > 0) {
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
