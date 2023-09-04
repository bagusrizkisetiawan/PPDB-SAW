<?php

if (isset($_POST['simpan'])) {
    $jurusan = $_POST['jurusan'];
    $simpan = mysqli_query($conn, "INSERT INTO jurusan VALUES('','$jurusan')");
    $alert = '
    <div class="alert alert-success">Berhasil Menambah jurusan</div>
    ';
    echo $refresh(2, "?page=jurusan");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Jurusan</h1>
</div>

<div class="card">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="text" name="jurusan" class="form-control mb-3" placeholder="Nama Jurusan">
            <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>