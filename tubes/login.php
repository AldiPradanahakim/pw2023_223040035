<?php
session_start();
require 'admin/functions.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // Ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT id, username, role FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // Cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['submit'] = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['user_id'] = $row['id'];
  }
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {
    // Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // Set session
      $_SESSION["submit"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["role"] = $row['role'];
      $_SESSION["user_id"] = $row['id'];

      // Redirect ke halaman sesuai peran
      if ($row['role'] === 'admin') {
        header("Location: admin/index.php");
        exit;
      } else if ($row['role'] === 'user') {
        header("Location: index.login.php");
        exit;
      } else {
        echo "Anda tidak memiliki akses.";
      }
    } else {
      $error = true;
    }
  } else {
    $error = true;
  }
}
if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Registration Successful.');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <?php if (isset($eror)) : ?>
        <p style="color:aqua; font-style:italic">username / password salah</p>
      <?php endif; ?>
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" name="login" value="Login" class="btn solid" />

        </form>
        <form action="#" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nama" name="nama" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password2" />
          </div>
          <div class="input-field">
            <i class="fa-light fa-image-user"></i>
            <input type="file" name="gambar" id="gambar" placeholder="input gambar" />
          </div>
          <input type="submit" name="register" class="btn" value="Sign up" />
          <h2 class="social-text">Or Sign up with social platforms</h2>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3 class="h3">New here ?</h3>
          <p class="p">
            Selamat datang! Untuk mengakses fitur-fitur eksklusif kami, kami mohon agar Anda melakukan registrasi terlebih dahulu. Dengan mendaftar, Anda akan mendapatkan manfaat seperti akses ke konten premium, notifikasi terkini, dan kesempatan untuk berinteraksi dengan komunitas kami.
          </p>
          <button class="btn transparent" id="sign-up-btn">Sign up</button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3 class="h3">One of us ?</h3>
          <p class="p">
            Selamat! Anda telah berhasil melakukan registrasi di situs berita kami. Sekarang, sebagai anggota, Anda akan mendapatkan akses penuh ke berbagai fitur dan konten yang kami sediakan. Dapatkan berita terkini, ulasan mendalam, artikel eksklusif, dan banyak lagi.
          </p>
          <button class="btn transparent" id="sign-in-btn">Sign in</button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="js/login.js"></script>
</body>

</html>