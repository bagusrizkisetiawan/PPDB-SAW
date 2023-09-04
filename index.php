<?php
session_start();
$id_user = @$_SESSION['id_user'];
include "koneksi.php";
include "control.php";

$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SMK Pangudi Luhur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>

<body>


  <?php

  if ($page == 'jurusan') {
    $titleBanner = "Jurusan SMK Pangudi Luhur";
    include "page/banner.php";
    include "page/jurusan.php";
  } elseif ($page == 'about') {
    $titleBanner = "Tentang SMK Pangudi Luhur";
    include "page/banner.php";
    include "page/about.php";
  } elseif ($page == 'artikel') {
    $titleBanner = "Artikel SMK Pangudi Luhur";
    include "page/banner.php";
    include "page/artikel.php";
  } elseif ($page == 'detail') {
    $titleBanner = "Detail Artikel ";
    include "page/banner.php";
    include "page/detail.php";
  } elseif (!empty($_GET['search'])) {
    $titleBanner = 'Pencarian Artikel "' . $_GET['search'] . '" ';
    include "page/banner.php";
    include "page/artikel.php";
  } else {

    include "page/banner-top.php";
    include "page/jurusan.php";
    include "page/about.php";
    include "page/artikel.php";
  }

  ?>





  <footer class="py-5 mt-5">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5 pe-0 pe-lg-5">
          <h4 class="text-warning">SMK Pangudi Luhur</h4>
          <p class="text-light small mt-3 pe-0 pe-lg-5">
            SMK Pangudi Luhur telah berkembang menjadi lembaga pendidikan yang
            terkemuka dengan reputasi yang solid dan berdedikasi untuk
            memberikan pendidikan berkualitas tinggi kepada siswa-siswi di
            tingkat menengah kejuruan.
          </p>
        </div>
        <div class="col-lg-3">
          <h5 class="text-warning mb-3">Navigation</h5>
          <p>
            <a href="" class="link-light text-decoration-none small">Home</a>
          </p>
          <p>
            <a href="" class="link-light text-decoration-none small">Jurusan</a>
          </p>
          <p>
            <a href="" class="link-light text-decoration-none small">Tentang Kami</a>
          </p>
          <p>
            <a href="" class="link-light text-decoration-none small">Artikel</a>
          </p>
        </div>
        <div class="col-lg-3">
          <h5 class="text-warning mb-3">Contact</h5>
          <p>
            <a href="" class="link-light text-decoration-none small">Jl. Syam Ratulangi, Rejosari Mataram, Kec. Seputih Mataram</a>
          </p>
          <p>
            <a href="" class="link-light text-decoration-none small">+62 834 8989 7878</a>
          </p>
          <p>
            <a href="" class="link-light text-decoration-none small">smkpang@gmail.com</a>
          </p>

        </div>
      </div>
      <div class="mt-4">
        <p class="xx-small text-white">&copy; SMK Pangudi Luhur Seputih Mataram</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>