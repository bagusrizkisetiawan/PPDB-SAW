<?php
include "autentikasi.php";
include "../koneksi.php";
include "controls/main.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SMK Pangudi Luhur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
</head>

<body class="bg-light">

    <div class="py-3  shadow-sm">
        <div class="container d-flex justify-content-between">

            <button type="button" class="btn btn-warning text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="bx bx-menu"></i></button>

            <div class="nav-item dropdown ">
                <div class="d-flex" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <div class=" p-1 px-3">Admin</div>
                    <div class="">
                        <a class="nav-link img-profil ms-0" style="background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png') ;" href="#">
                        </a>
                    </div>
                </div>

                <ul class="dropdown-menu">

                    <li><a class="dropdown-item bg-white link-secondary" href="logout.php"><i class="bx bx-log-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" style="width: 300px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-warning" id="offcanvasExampleLabel">SMK PALU</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-5">
            <ul class="nav flex-column">
                <h6 class="text-secondary ps-3">Home</h6>
                <li class="nav-item">
                    <a class="nav-link link-secondary 
                    <?php if (empty($page)) {
                        echo "active";
                    } ?>
                    " href="./">
                        <i class="bx bx-home me-2"></i>
                        Dashboard
                    </a>
                </li>
                <br>
                <h6 class="text-secondary ps-3">User</h6>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'jurusan') {
                                                            echo "active";
                                                        } ?>" href="?page=jurusan">
                        <i class="bx bx-user-circle me-2"></i>
                        Jurusan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'guru') {
                                                            echo "active";
                                                        } ?>" href="?page=guru">
                        <i class="bx bx-user-voice me-2"></i>
                        Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'siswa') {
                                                            echo "active";
                                                        } ?>" href="?page=siswa">
                        <i class="bx bxs-user-account me-2"></i>
                        Siswa
                    </a>
                </li>
                <br>
                <h6 class="text-secondary ps-3">Postingan</h6>

                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'artikel') {
                                                            echo "active";
                                                        } ?>" href="?page=artikel">
                        <i class="bx bx-book-open me-2"></i>
                        Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'pengumuman') {
                                                            echo "active";
                                                        } ?>" href="?page=pengumuman">
                        <i class="bx bx-chat me-2"></i>
                        pengumuman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'komentar') {
                                                            echo "active";
                                                        } ?>" href="?page=komentar">
                        <i class="bx bx-edit-alt me-2"></i>
                        Komentar
                    </a>
                </li>
                <br>
                <h6 class="text-secondary ps-3">Penerimaan</h6>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'kriteria') {
                                                            echo "active";
                                                        } ?>" href="?page=kriteria">
                        <i class="bx bxs-user-detail me-2"></i>
                        Kriteria
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'pendaftar') {
                                                            echo "active";
                                                        } ?>" href="?page=pendaftar">
                        <i class="bx bxs-user-plus me-2"></i>
                        Pendaftar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'hasil') {
                                                            echo "active";
                                                        } ?>" href="?page=hasil">
                        <i class="bx bxs-user-check me-2"></i>
                        Hasil
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end offcanvas -->

    <div class="container py-4">

        <?php

        if (!empty($page)) {
            include "page/$page.php";
        } else {
            include "page/dashboard.php";
        }

        ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).ready(function() {
            $('#dataTable-2').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        <?php
        $thn_sekarang = date('Y');
        $thn_5 = date('Y', strtotime('-4 years', strtotime($thn_sekarang)));
        $thn = array($thn_5);
        for ($i = 1; $i <= 5; $i++) {
            array_push($thn, $thn_5 + $i);
        }
        ?>

        new Chart(ctx, {

            type: 'line',
            data: {
                labels: <?php
                        echo "[";
                        for ($i = 0; $i < 5; $i++) {
                            echo $thn[$i] . ",";
                        }
                        echo "]";
                        ?>,
                datasets: [{
                    type: 'line',
                    label: 'Teknik Kendaraan Ringan',
                    data: <?php
                            $thn1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Teknik Kendaraan Ringan' and b.angkatan='$thn[0]'"));
                            $thn2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Teknik Kendaraan Ringan' and b.angkatan='$thn[1]'"));
                            $thn3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Teknik Kendaraan Ringan' and b.angkatan='$thn[2]'"));
                            $thn4 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Teknik Kendaraan Ringan' and b.angkatan='$thn[3]'"));
                            $thn5 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Teknik Kendaraan Ringan' and b.angkatan='$thn[4]'"));
                            echo "[";
                            echo $thn1 . ",";
                            echo $thn2 . ",";
                            echo $thn3 . ",";
                            echo $thn4 . ",";
                            echo $thn5 . ",";
                            echo "]";
                            ?>,
                    borderColor: 'rgb(220, 53, 69)',
                    backgroundColor: 'rgb(220, 53, 69)'
                }, {
                    type: 'line',
                    label: 'Rekayasa Perangkat Lunak',
                    data: <?php
                            $thn1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' and b.angkatan='$thn[0]'"));
                            $thn2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' and b.angkatan='$thn[1]'"));
                            $thn3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' and b.angkatan='$thn[2]'"));
                            $thn4 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' and b.angkatan='$thn[3]'"));
                            $thn5 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' and b.angkatan='$thn[4]'"));
                            echo "[";
                            echo $thn1 . ",";
                            echo $thn2 . ",";
                            echo $thn3 . ",";
                            echo $thn4 . ",";
                            echo $thn5 . ",";
                            echo "]";
                            ?>,
                    backgroundColor: 'rgb(255, 193, 7)',
                    borderColor: 'rgb(255, 193, 7)'
                }]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>