<?php
require('functions.php');
$name = 'Home';

$students = query("SELECT * FROM mahasiswa");


// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
