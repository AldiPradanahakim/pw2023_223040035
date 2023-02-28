<?php
$jumlah_angkot = 10;
$angkot_rusak = 4;

$no_angkot = 1;
while ($no_angkot <= $jumlah_angkot - $angkot_rusak) {
    echo "Angkot no. $no_angkot beroperasi dengan baik. <br>";
    $no_angkot++;
}

for ($angkot_rusak = 7; $angkot_rusak <= $jumlah_angkot; $angkot_rusak++) {
    echo "Angkot no. $angkot_rusak sedang rusak. <br>";
}
