<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Perhitungan</h1>
</div>

<?php
$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kriteria_spk a LEFT JOIN jurusan b ON a.id_jurusan=b.id_jurusan WHERE  nama_jurusan ='Teknik Kendaraan Ringan'"));
$cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kriteria_spk a LEFT JOIN jurusan b ON a.id_jurusan=b.id_jurusan WHERE nama_jurusan='Rekayasa Perangkat Lunak' "));

if (empty($cek) || empty($cek2)) {

?>
    <div class="alert alert-warning">Isi kriteria dahulu sebelum melihat hasil pembobotan</div>
<?php
} else {

?>

    <div class="card border-0 shadow    ">
        <div class="card-header ">
            <div class="row justify-content-between">
                <div class="col-auto">

                    <h6 class="my-1 fw-normal"> Rekayasa Perangkat Lunak</h6>
                </div>
                <div class="col-auto">
                    <a href="print.php?jurusan=Rekayasa Perangkat Lunak" class="btn btn-warning text-light btn-sm">Print Hasil</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-2">
                <table class="table py-3" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Hasil Pembobotan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach (hasilDataNormalisasi("Rekayasa Perangkat Lunak") as $rpl) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $rpl[0] ?></td>
                                <td><?php echo $rpl[1] ?></td>
                                <td><?php echo $rpl[2] ?></td>
                                <td><?php echo $rpl[3] ?></td>
                                <td><?php echo $rpl[4] ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card border-0 shadow my-5">
        <div class="card-header ">
            <div class="row justify-content-between">
                <div class="col-auto">

                    <h6 class="my-1 fw-normal">Teknik Kendaraan Ringan</h6>
                </div>
                <div class="col-auto">
                    <a href="print.php?jurusan=Teknik Kendaraan Ringan" class="btn btn-warning text-light btn-sm">Print Hasil</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-2">
                <table class="table py-3" id="dataTable-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Hasil Pembobotan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach (hasilDataNormalisasi('Teknik Kendaraan Ringan') as $tkr) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $tkr[0] ?></td>
                                <td><?php echo $tkr[1] ?></td>
                                <td><?php echo $tkr[2] ?></td>
                                <td><?php echo $tkr[3] ?></td>
                                <td><?php echo $tkr[4] ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>