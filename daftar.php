<?php
include "koneksi.php";
if (!empty($_GET['page'])) {
    $nisn = $_GET['nisn'];
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $id_jurusan = $_GET['id_jurusan'];

    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pendaftar_pmb WHERE nisn ='$nisn'"));

    if (!empty($cek)) {
        $alert = "
            <script>
                Swal.fire({
                    title: 'Peringatan!',
                    html: 'NISN sudah terdaftar, silahkan pantau email yang terdaftar atau datang langsung tanggal <b>01 Juli 2023</b> ke SMK pangudi Luhur untuk melihat pengumuman penerimaan siswa!',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'daftar.php';
                    }
                })
            </script>
            ";
    }


    if (isset($_POST['daftar'])) {
        $jarak_rumah = $_POST['jarak_rumah'];
        $mtk = $_POST['mtk'];
        $ipa = $_POST['ipa'];
        $inggris = $_POST['inggris'];
        $indonesia = $_POST['indonesia'];
        $agama = $_POST['agama'];
        $ppkn = $_POST['ppkn'];

        $simpan = mysqli_query($conn, "INSERT INTO pendaftar_pmb VALUES ('','$nisn','$nama','$email','$id_jurusan','$jarak_rumah','$mtk','$ipa','$inggris','$indonesia','$agama','$ppkn') ");
        if ($simpan) {
            $alert = "
            <script>
                Swal.fire({
                    title: 'Selamat!!',
                    html: 'Anda sudah terdaftar, silahkan pantau email yang terdaftar atau datang langsung tanggal <b>01 Juli 2023</b> ke SMK pangudi Luhur untuk melihat pengumuman penerimaan siswa!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'daftar.php';
                    }
                })
            </script>
            ";
        } else {
            $alert = "
            <script>
                Swal.fire({
                    title: 'Peringatan!',
                    html: 'Masukan dengan Benar data Anda',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'daftar.php';
                    }
                })
            </script>
            ";
        }
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
    <?php
    if (empty($_GET['page'])) {
    ?>
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card shadow border-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body p-5">
                                    <h5 class="text-warning">Daftar</h5>
                                    <p class="text-danger small mt-3">Isikan form pendaftaran Sesuai dengan data diri anda</p>
                                    <form action="" method="get" class="mt-5">
                                        <input type="text" name="page" value="lanjut" class="d-none">
                                        <input type="number" name="nisn" class="form-control mb-3 p-2" placeholder="NISN" required>
                                        <input type="text" name="nama" class="form-control mb-3 p-2" placeholder="Nama" required>
                                        <input type="email" name="email" class="form-control mb-3 p-2" placeholder="Email" required>
                                        <select name="id_jurusan" id="" class="form-control p-2 mb-3" required>
                                            <option value="" selected disabled>Pilih jurusan</option>
                                            <?php
                                            $q = mysqli_query($conn, "SELECT * FROM jurusan");
                                            while ($jurusan = mysqli_fetch_array($q)) {
                                            ?>
                                                <option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <button class="btn btn-warning text-white px-4 p-2">Lanjut</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="img-daftar-1 w-100 h-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {

    ?>
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card shadow border-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body p-5">
                                    <h5 class="text-warning">Daftar</h5>
                                    <p class="text-danger small mt-3">Isikan form pendaftaran Sesuai dengan data diri anda</p>
                                    <form action="" method="post" class="mt-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="jarak_rumah" placeholder="Jarak Rumah">
                                            <span class="input-group-text" id="basic-addon2">Meter</span>
                                        </div>

                                        <input type="number" name="mtk" class="form-control mb-3 p-2" placeholder="Nilai MTK" required min="1" max="100">
                                        <input type="number" name="ipa" class="form-control mb-3 p-2" placeholder="Nilai IPA" required min="1" max="100">
                                        <input type="number" name="inggris" class="form-control mb-3 p-2" placeholder="Nilai B.Inggris" required min="1" max="100">
                                        <input type="number" name="indonesia" class="form-control mb-3 p-2" placeholder="Nilai B.Indonesia" required min="1" max="100">
                                        <input type="number" name="agama" class="form-control mb-3 p-2" placeholder="Nilai Agama" required min="1" max="100">
                                        <input type="number" name="ppkn" class="form-control mb-3 p-2" placeholder="Nilai PPKN" required min="1" max="100">

                                        <button class="btn btn-warning text-white px-4 p-2" name="daftar">Daftar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="img-daftar-2 w-100 h-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php

    echo @$alert;

    ?>

</body>

</html>