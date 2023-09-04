<?php
$id = $_GET['id'];

if (isset($_POST['kirimKomentar'])) {
    $komentar = $_POST['komentar'];

    $tanggal = date("Y-m-d");
    $simpan = mysqli_query($conn, "INSERT INTO komentar_pengumuman VALUES ('','$id_user','$id','$tanggal','$komentar')");
    if ($simpan) {
        echo $refresh(0, "?page=detail_pengumuman&&id=$id");
    } else {
        echo "jsaaojs";
    }
}
?>

<div class="card my-4">
    <div class="card-body p-4">
        <?php
        $q = mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman ='$id'");
        $d = mysqli_fetch_array($q)
        ?>

        <h4><?php echo $d['judul'] ?></h4>
        <p class="small"><?php echo $d['tanggal'] ?></p>

        <?php echo $d['pengumuman'] ?>

        <form action="" method="post" class="mt-5">
            <div class="input-group mb-3">
                <input type="text" class="form-control p-2" name="komentar" placeholder="Masukan Komentar" required>
                <button class="input-group-text btn btn-warning py-2 text-light" name="kirimKomentar"><i class="bx bx-send"></i></button>
            </div>
        </form>
        <h5>Komentar</h5>
        <?php
        $q = mysqli_query($conn, "SELECT * FROM komentar_pengumuman a LEFT JOIN user b ON a.id_user=b.id_user WHERE id_pengumuman='$id'");
        while ($komentar = mysqli_fetch_array($q)) {
        ?>
            <div class="d-flex mt-3">
                <div class="me-3">
                    <?php
                    if ($komentar['foto'] != '') {
                    ?>
                        <div class="img-komentar" style="background-image: url('../img/user/<?php echo $komentar['foto'] ?>');"></div>
                    <?php } else { ?>
                        <div class="img-komentar" style="background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png');"></div>

                    <?php } ?>
                </div>
                <div class="small">
                    <span class="text-warning"><?php echo $komentar['nama'] ?> (<?php echo $komentar['level'] ?>)</span>
                    <span class="text-secondary ms-2 xx-small"><?php echo $komentar['tanggal'] ?></span>
                    <br>
                    <?php echo $komentar['komentar'] ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>