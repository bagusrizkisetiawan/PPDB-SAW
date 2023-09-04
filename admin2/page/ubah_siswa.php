<?php

$id = $_GET['id'];


if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $angkatan = $_POST['angkatan'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password' and id_user!='$id'");

    $cek = mysqli_num_rows($q);

    $ceknis = mysqli_num_rows(
        mysqli_query($conn, "SELECT * FROM data_siswa WHERE nis='$nis' and id_user !='$id'")
    );

    if (empty($cek) and empty($ceknis)) {

        $simpan = $editUser($nama, $username, $password, $id);
        if ($simpan) {
            $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
            $data = mysqli_fetch_array($q);

            $id = $data['id_user'];
            $simpan = mysqli_query($conn, "UPDATE data_siswa SET nis='$nis', nisn='$nisn', id_jurusan='$id_jurusan', angkatan='$angkatan' WHERE id_user='$id'");
            if ($simpan) {
                $alert = $alertSuccess('Berhasil Mengubah Siswa');
                echo $refresh('1', '?page=siswa');
            }
        }
    } else {
        $alert = $alertDanger('NIS / NISN / Username / password sudah di terdaftar');
    }
}

$s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'"));
$ds = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_siswa a LEFT JOIN jurusan b on a.id_jurusan =b.id_jurusan WHERE id_user='$id'"));


?>
<h3>Ubah Siswa</h3>
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <?php echo @$alert; ?>
        <form action="" method="post">
            <input type="number" name="nis" class="form-control mb-3 p-2" value="<?php echo $ds['nis'] ?>" required placeholder="Masukan NIS">
            <input type="number" name="nisn" class="form-control mb-3 p-2" value="<?php echo $ds['nisn'] ?>" required placeholder="Masukan NISN">
            <input type="text" name="nama" class="form-control mb-3 p-2" value="<?php echo $s['nama'] ?>" required placeholder="Masukan Nama">
            <select name="id_jurusan" id="" class="form-control mb-3 p-2" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                <?php
                $q =  mysqli_query($conn, "SELECT * FROM jurusan");
                while ($d = mysqli_fetch_array($q)) {
                ?>
                    <option value="<?php echo $d['id_jurusan'] ?>"><?php echo $d['nama_jurusan'] ?></option>
                <?php } ?>
            </select>

            <input type="number" name="angkatan" class="form-control mb-3 p-2" value="<?php echo $ds['angkatan'] ?>" required placeholder="Masukan Angkatan">
            <input type="text" name="username" class="form-control mb-3 p-2" value="<?php echo $s['username'] ?>" required placeholder="Masukan Username">
            <input type="text" name="password" class="form-control mb-3 p-2" required placeholder="Masukan Password">
            <button class="btn btn-primary text-light p-2 px-4" name="simpan">Simpan</button>
            <a href="?page=siswa" class="btn btn-secondary p-2 px-4">Kembali</a>
        </form>
    </div>
</div>