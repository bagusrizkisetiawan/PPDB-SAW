<?php
include "autentikasi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @page {
            size: auto;
            margin: 0mm;
        }
    </style>
</head>

<body class="px-5 py-3">



    <div class="text-center mt-5">
        <h4>Data siswa yang di terima masuk kedalam SMK Pengudi Luhur </h4>
        <h5>Jurusan <?php echo $_GET['jurusan'] ?></h5>
        <h5>Tahun 2023/2024</h5>
    </div>

    <div class="container-fuild mt-5">
        <table class="table table-striped">
            <tr class="table-dark ">
                <th class="small">No</th>
                <th class="small">NISN</th>
                <th class="small">Nama</th>
                <th class="small">Email</th>
                <th class="small">Hasil Pembobotan</th>
            </tr>
            <?php
            include "controls/main.php";
            $no = 1;
            foreach (hasilDataNormalisasi($_GET['jurusan']) as $data) {
            ?>
                <tr>
                    <td class="small"><?php echo $no ?></td>
                    <td class="small"><?php echo $data[0] ?></td>
                    <td class="small"><?php echo $data[1] ?></td>
                    <td class="small"><?php echo $data[2] ?></td>
                    <td class="small"><?php echo $data[4] ?></td>
                </tr>
            <?php $no++;
            } ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        window.print();
        onafterprint = function() {
            window.location.href = document.referrer;
        }
    </script>
</body>

</html>