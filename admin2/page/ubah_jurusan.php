<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $jurusan = $_POST['jurusan'];
    $simpan = mysqli_query($conn, "UPDATE jurusan SET nama_jurusan='$jurusan' WHERE id_jurusan='$id'");
    $alert = '
    <div class="alert alert-success">Berhasil Mengubah jurusan</div>
    ';
    echo $refresh(2, "?page=jurusan");
}

$d =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan='$id'"));
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Jurusan</h1>
</div>

<div class="card">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="text" name="jurusan" class="form-control mb-3" placeholder="Nama Jurusan" value="<?php echo $d['nama_jurusan'] ?>">
            <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>