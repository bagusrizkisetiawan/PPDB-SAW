<?php

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");

    $cek = mysqli_num_rows($q);

    $ceknip = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_guru WHERE nip='$nip'"));

    if (empty($cek) and empty($ceknip)) {

        $simpan = $tambahUser($nama, $username, $password, 'guru');
        if ($simpan) {
            $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
            $data = mysqli_fetch_array($q);

            $id = $data['id_user'];
            $simpan = mysqli_query($conn, "INSERT INTO data_guru VALUES('$nip','$id','$mapel','','','')");
            if ($simpan) {
                $alert = $alertSuccess('Berhasil Menambah guru');
                echo $refresh('1', '?page=tambah_guru');
            }
        }
    } else {
        $alert = $alertDanger('NIP atau Username atau password sudah di pakai');
    }
}

?>
<h3>Tambah Guru</h3>
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="number" name="nip" class="form-control mb-3 p-2" required placeholder="Masukan NIP">
            <input type="text" name="nama" class="form-control mb-3 p-2" required placeholder="Masukan Nama">
            <input type="text" name="mapel" class="form-control mb-3 p-2" required placeholder="Masukan Mata Pelajaran">
            <input type="text" name="username" class="form-control mb-3 p-2" required placeholder="Masukan Username">
            <input type="text" name="password" class="form-control mb-3 p-2" required placeholder="Masukan Password">
            <button class="btn btn-primary text-light p-2 px-4" name="simpan">Simpan</button>
            <a href="?page=guru" class="btn btn-secondary p-2 px-4">Kembali</a>
        </form>
    </div>
</div>