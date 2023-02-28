<?php

echo "<h4>Menghitung Luas Lingkaran</h4>";
function hitungLuasLingkaran($r)
{
    //ngitung luas lingkaran rumusnya pi x r x r
    $luas = 3.14 * $r * $r;
    return $luas . " cm<sup>2</sup>";
    //tambahin <sup> biar angkanya jadi naik keatas kecil
}
echo "Jari-jari = 10 cm. <br>";
echo "Luas Lingkaran = " . hitungLuasLingkaran(10) . " <br>";

echo "<hr>";

echo "<h4>Menghitung Keliling Lingkaran</h4>";
function hitungKelilingLingkaran($r)
{
    //ngitung keliling lingkaran rumusnya 2 x pi x r
    $keliling = 2 * 3.14 * $r;
    return $keliling . " cm";
    //tambahkan string cm di return agar mempunyai output dengan cm diakhirnya
}

echo "Jari-jari = 20 cm. <br>";
echo "Luas Lingkaran = " . hitungKelilingLingkaran(20) . "<br>";

echo "<hr>";
