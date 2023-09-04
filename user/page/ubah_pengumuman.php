<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $pengumuman = mysqli_real_escape_string($conn, "$_POST[pengumuman]");
    $tanggal = date("Y-m-d");



    mysqli_query($conn, "UPDATE pengumuman SET judul='$judul', pengumuman='$pengumuman' WHERE id_pengumuman ='$id'");
    $alert = $alertSuccess("Berhasil mengubah pengumuman");


    echo $refresh(2, "?page=pengumuman");
}

$pengumuman = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman ='$id'"));
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Tambah Pengumuman</h3>
</div>
<div class="card">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="text" name="judul" class="form-control p-2 mt-2 mb-3" value="<?php echo $pengumuman['judul'] ?>" placeholder="Judul">

            <textarea name="pengumuman" id="editor" style="height: 200px;" class="w-100"><?php echo $pengumuman['pengumuman'] ?></textarea>
            <button class="btn btn-primary p-2 px-3 mt-4" name="simpan">Simpan</button>
            <a href="?page=pengumuman" class="btn btn-secondary p-2 px-3 mt-4">Kembali</a>
        </form>
    </div>
</div>