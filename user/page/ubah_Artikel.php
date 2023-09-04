<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $keterangan = mysqli_real_escape_string($conn, "$_POST[keterangan]");
    $tanggal = date("Y-m-d");

    $gambar = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if (empty($gambar)) {
        $ubah = mysqli_query($conn, "UPDATE artikel SET judul ='$judul', keterangan='$keterangan' WHERE id_artikel='$id'");
    } else {
        $data = mysqli_fetch_array($query("artikel", "id_artikel", $id));
        unlink("../img/artikel/$data[gambar]");

        move_uploaded_file($file_tmp, '../img/artikel/' . $gambar);
        $ubah = mysqli_query($conn, "UPDATE artikel SET judul ='$judul',gambar='$gambar', keterangan='$keterangan' WHERE id_artikel='$id'");
    }

    if ($ubah) {
        $alert = $alertSuccess("Berhasil Mengubah artikel");
    }


    echo $refresh(2, "?page=artikel");
}

$data = mysqli_fetch_array($query("artikel", "id_artikel", $id));

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Tambah Artikel</h3>
</div>
<div class="card">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="judul" class="form-control p-2 mt-2 mb-3" value="<?php echo $data['judul'] ?>" placeholder="Judul">
            <input type="file" name="gambar" class="form-control p-2 mt-2 mb-3" accept="image/png, image/gif, image/jpeg">
            <textarea name="keterangan" id="editor" style="height: 200px;" class="w-100"><?php echo $data['keterangan'] ?></textarea>
            <button class="btn btn-primary p-2 px-3 mt-4" name="simpan">Simpan</button>
            <a href="?page=artikel" class="btn btn-secondary p-2 px-3 mt-4">Kembali</a>
        </form>
    </div>
</div>