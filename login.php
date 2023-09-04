<?php
session_start();
include "koneksi.php";

if (isset($_POST['masuk'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' and password='$password'");
  $cek = mysqli_num_rows($q);

  $q_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
  $cek_user = mysqli_num_rows($q_user);
  $user = mysqli_fetch_array($q_user);

  if ($cek_user != 0) {
    $_SESSION['id_user'] = $user['id_user'];
    $alert = "
    <script>
        Swal.fire({
            title: 'Selamat!!',
            html: 'Anda berhasil Login',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Oke'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = './';
            }
        })
    </script>
    ";
  } elseif ($cek != 0) {
    $_SESSION['login'] = "masuk";
    $alert = "
    <script>
        Swal.fire({
            title: 'Selamat!!',
            html: 'Anda berhasil Login',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Oke'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'admin2/';
            }
        })
    </script>
    ";
  } else {
    $alert = "
    <script>
        Swal.fire({
            title: 'Peringatan!',
            html: 'Username dan password tidak valid',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Oke'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'login.php';
            }
        })
    </script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SMK Pangudi Luhur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container mt-5 ">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8 mt-5">
        <div class="card shadow border-0">
          <div class="row">
            <div class="col-lg-6">
              <div class="card-body p-5">
                <h5 class="text-warning">Login</h5>
                <p class="text-secondary small mt-3">Login terlebih dahulu sebelum memasuki dasdhboard <i class="bx bx-rocket"></i></p>
                <form action="" method="post" class="mt-5">
                  <input type="text" name="username" class="form-control mb-3 p-2 px-3" placeholder="username">
                  <input type="password" name="password" class="form-control mb-3 p-2 px-3" placeholder="password">
                  <button class="btn btn-warning text-white px-4" name="masuk">Masuk</button>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="img-login w-100 h-100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php

  echo @$alert;

  ?>
</body>

</html>