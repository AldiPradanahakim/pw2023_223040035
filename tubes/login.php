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
    $_SESSION["login"] = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['user_id'] = $row['id'];
  }
}

if (isset($_SESSION["login"])) {
  header("location: index.login.php");

  exit;
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
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["role"] = $row['role'];
      $_SESSION["user_id"] = $row["user_id"];



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
  <title>ALL News</title>
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
          <input type="submit" name="register" class="btn" value="Sign up" />

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3 class="h3">New here ?</h3>
          <p class="p">
            Jika Anda belum memiliki akun, silakan daftar terlebih dahulu untuk dapat mengakses layanan
            kami.
          </p>
          <button class="btn transparent" id="sign-up-btn">Sign up</button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3 class="h3">One of us ?</h3>
          <p class="p">
            Terima kasih telah mendaftar dan selamat datang di komunitas kami! Silakan masuk ke halaman web kami untuk memulai perjalanan Anda bersama kami.
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