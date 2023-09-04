<?php
$id = $_GET['id'];
$data = artikeldetail($id);

if (isset($_POST['kirimKomentar'])) {
    $tanggal = date("Y-m-d");
    $komentar = $_POST['komentar'];

    $qk = mysqli_query($conn, "INSERT INTO komentar VALUES('','$id_user','$id','$tanggal','$komentar')");
    if ($qk) {
        echo $refresh(0, "?page=detail&&id=$id");
    }
}
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h2 class="mb-3" data-aos="fade-up"><?php echo $data['judul']; ?></h2>
            <p data-aos="fade-up"><?php echo $data['tanggal']; ?><span class="ms-5">By : <?php echo $data['nama']; ?></span></p>
            <img src="img/artikel/<?php echo $data['gambar']; ?>" alt="" class="w-100 mb-4" data-aos="fade-up">
            <?php echo $data['keterangan']; ?>


            <?php
            if (!empty($id_user)) {
            ?>
                <form action="" method="post" class="mt-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control p-2" name="komentar" placeholder="Masukan Komentar" required>
                        <button class="input-group-text btn btn-warning py-2 text-light" name="kirimKomentar"><i class="bx bx-send"></i></button>
                    </div>
                </form>
            <?php } ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h5>Komentar</h5>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM komentar a LEFT JOIN user b ON a.id_user=b.id_user WHERE id_artikel='$id'");
                    while ($komentar = mysqli_fetch_array($q)) {
                    ?>
                        <div class="d-flex mt-3">
                            <div class="me-3">
                                <?php
                                if ($komentar['foto'] != '') {
                                ?>
                                    <div class="img-komentar" style="background-image: url('img/user/<?php echo $komentar['foto'] ?>');"></div>
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
        </div>
    </div>
</div>