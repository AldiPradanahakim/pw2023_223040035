<?php
require '../functions.php';
$keyword = $_GET['keyword'];
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

$students = query($query);
?>

<?php if ($students) : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <th scope="row"><?= $student["id"]; ?></th>
                    <td><img src="img/default.png" width="70"></td>
                    <td><?= $student["nim"]; ?></td>
                    <td><?= $student["nama"]; ?></td>
                    <td><?= $student["email"]; ?></td>
                    <td><?= $student["jurusan"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $student['id']; ?>">ubah</a>
                        <a href="hapus.php?id=<?= $student['id']; ?>" onclick="return confirm('yakin');">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
        </div>
    </div>

<?php endif; ?>