<?php

$id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password' and id_user !='$id'");

    $cek = mysqli_num_rows($q);
    $ceknip = mysqli_num_rows(
        mysqli_query($conn, "SELECT * FROM data_guru WHERE nip='$nip' and id_user!='$id'")
    );

    if (empty($cek) and empty($ceknip)) {

        $simpan = $editUser($nama, $username, $password, $id);
        if ($simpan) {
            $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
            $data = mysqli_fetch_array($q);


            $id = $data['id_user'];
            $simpan = mysqli_query($conn, "UPDATE data_guru SET nip='$nip', mapel='$mapel' WHERE id_user='$id'");
            if ($simpan) {
                $alert = $alertSuccess('Berhasil Mengubah guru');
                echo $refresh('1', '?page=guru');
            }
        }
    } else {
        $alert = $alertDanger('Username atau password sudah di pakai');
    }
}

$g = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'"));
$dg = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_guru WHERE id_user='$id'"));

?>
<h3>Ubah Data Guru</h3>
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="number" name="nip" class="form-control mb-3 p-2" value="<?php echo $dg['nip'] ?>" required placeholder="Masukan NIP">
            <input type="text" name="nama" class="form-control mb-3 p-2" value="<?php echo $g['nama'] ?>" required placeholder="Masukan Nama">
            <input type="text" name="mapel" class="form-control mb-3 p-2" value="<?php echo $dg['mapel'] ?>" required placeholder="Masukan Mata Pelajaran">
            <input type="text" name="username" class="form-control mb-3 p-2" value="<?php echo $g['username'] ?>" required placeholder="Masukan Username">
            <input type="text" name="password" class="form-control mb-3 p-2" required placeholder="Masukan Password">
            <button class="btn btn-primary text-light p-2 px-4" name="simpan">Simpan</button>
            <a href="?page=guru" class="btn btn-secondary p-2 px-4">Kembali</a>
        </form>
    </div>
</div>