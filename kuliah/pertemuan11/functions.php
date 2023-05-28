<?php
define('BASE_URL', '/pw2023_223040035/kuliah/pertemuan12/');

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040035') or die('KONEKSI KE DB GAGAL!');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  die;
  echo "</pre>";
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === BASE_URL) ? 'active' : '';
}
