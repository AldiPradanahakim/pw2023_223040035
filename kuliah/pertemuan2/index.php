<?php

$nama = 'Aldi Pradana Hakim';
$mata_kuliah = 'Pemrograman Web';

//$mata_kuliah_umum // snake_case
//$matakuliahumum // camelcase
//$MataKuliahUmum // pascal case

?>


<!DOCTYPE html>
<html lang="ep
<head>
    <meta charset=" UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pertemuan 2</title>
</head>

<body>

    <h1>
        <?php echo "Hello, $nama"; ?>
    </h1>

    <p><?php echo $mata_kuliah; ?></p>
    <p><?php echo 'Halo, nama saya' . $nama . ', saya sedang kuliah "' . $mata_kuliah . '"'; ?></p>




</body>

</html>