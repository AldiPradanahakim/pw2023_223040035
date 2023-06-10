<?php
require('functions.php');
$name = 'Home';

$students = query("SELECT * FROM mahasiswa");

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM mahasiswa 
            where
            nama LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    $students = query($query);
}

// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
