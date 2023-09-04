<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $jarak_rumah = $_POST['jarak_rumah'];
    $mtk = $_POST['mtk'];
    $ipa = $_POST['ipa'];
    $inggris = $_POST['inggris'];
    $indonesia = $_POST['indonesia'];
    $agama = $_POST['agama'];
    $ppkn = $_POST['ppkn'];


    $simpan = mysqli_query($conn, "UPDATE kriteria_spk SET mtk='$mtk', ipa='$ipa', inggris='$inggris', indonesia='$indonesia', agama='$agama', ppkn='$ppkn' WHERE id_kriteria='$id'");

    if ($simpan) {
        $alert = '
        <div class="alert alert-success">Berhasil Mengubah kriteria</div>
        ';
        echo $refresh(2, "?page=kriteria");
    }
}

$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kriteria_spk WHERE id_kriteria = '$id'"));
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kriteria SPK</h1>
</div>

<div class="card">

    <div class="card-body">
        <?php echo @$alert ?>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Jurusan</label>
                </div>
                <div class="col-9">

                    <select name="id_jurusan" id="" class="form-control" disabled>
                        <option value="" selected disabled>Pilih Jurusan</option>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM jurusan");
                        while ($j = mysqli_fetch_array($q)) {
                        ?>
                            <option value="<?php echo $j['id_jurusan'] ?>" <?php if ($d['id_jurusan'] == $j['id_jurusan']) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $j['nama_jurusan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">jarak_rumah</label>
                </div>
                <div class="col-9">

                    <select name="jarak_rumah" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['jarak_rumah'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['jarak_rumah'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['jarak_rumah'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['jarak_rumah'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['jarak_rumah'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai MTK</label>
                </div>
                <div class="col-9">

                    <select name="mtk" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['mtk'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['mtk'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['mtk'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['mtk'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['mtk'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai IPA</label>
                </div>
                <div class="col-9">

                    <select name="ipa" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['ipa'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['ipa'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['ipa'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['ipa'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['ipa'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai B.Inggris</label>
                </div>
                <div class="col-9">

                    <select name="inggris" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['inggris'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['inggris'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['inggris'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['inggris'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['inggris'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai B.Indoensia</label>
                </div>
                <div class="col-9">

                    <select name="indonesia" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['indonesia'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['indonesia'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['indonesia'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['indonesia'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['indonesia'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai Agama</label>
                </div>
                <div class="col-9">

                    <select name="agama" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['agama'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['agama'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['agama'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['agama'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['agama'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">

                    <label for="" class="my-1">Nilai PPKN</label>
                </div>
                <div class="col-9">

                    <select name="ppkn" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Keterangan</option>
                        <option value="5" <?php if ($d['ppkn'] == 5) {
                                                echo "selected";
                                            } ?>>Sangat Penting</option>
                        <option value="4" <?php if ($d['ppkn'] == 4) {
                                                echo "selected";
                                            } ?>>Penting</option>
                        <option value="3" <?php if ($d['ppkn'] == 3) {
                                                echo "selected";
                                            } ?>>Tidak Terlalu Penting</option>
                        <option value="2" <?php if ($d['ppkn'] == 2) {
                                                echo "selected";
                                            } ?>>Tidak Penting</option>
                        <option value="1" <?php if ($d['ppkn'] == 1) {
                                                echo "selected";
                                            } ?>>Sangat Tidak Penting</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>