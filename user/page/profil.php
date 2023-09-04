<?php

if (isset($_POST['perbarui'])) {

    if ($user['foto'] != '') {
        unlink("../img/user/$user[foto]");
    }

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_wa = $_POST['no_wa'];
    $email = $_POST['email'];

    $cekUsername = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and id_user!='$id_user'"));
    if (empty($cekUsername)) {

        if (!empty($foto)) {
            move_uploaded_file($file_tmp, '../img/user/' . $foto);
        }
        $update = mysqli_query($conn, "UPDATE user SET nama='$nama', username='$username', foto='$foto' WHERE id_user='$id_user'");
        $updateData = mysqli_query($conn, "UPDATE data_siswa SET no_wa='$no_wa', email='$email' WHERE id_user='$id_user'");
        if ($update || $updateData) {
            $alert = $alertSuccess("Berhasil Memperbarui Profil");
            echo $refresh(2, "?page=profil");
        }
    }
}

if (isset($_POST['perbaruiguru'])) {

    if ($user['foto'] != '') {
        unlink("../img/user/$user[foto]");
    }

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_wa = $_POST['no_wa'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nip = $_POST['nip'];
    $mapel = $_POST['mapel'];

    $cekUsername = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and id_user!='$id_user'"));
    if (empty($cekUsername)) {

        if (!empty($foto)) {
            move_uploaded_file($file_tmp, '../img/user/' . $foto);
        }
        $update = mysqli_query($conn, "UPDATE user SET nama='$nama', username='$username', foto='$foto' WHERE id_user='$id_user'");
        $updateData = mysqli_query($conn, "UPDATE data_guru SET nip='$nip', mapel='$mapel', no_wa='$no_wa', email='$email', alamat='$alamat' WHERE id_user='$id_user'");
        if ($update || $updateData) {
            $alert = $alertSuccess("Berhasil Memperbarui Profil");
            echo $refresh(2, "?page=profil");
        }
    }
}

if (isset($_POST['simpanpassword'])) {
    $passwordLama = md5($_POST['passwordLama']);
    $passwordBaru = md5($_POST['passwordBaru']);

    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user' and password='$passwordLama'"));

    if (!empty($cek)) {
        $simpan = mysqli_query($conn, "UPDATE user SET password='$passwordBaru' WHERE id_user='$id_user'");
        if ($simpan) {
            $alert = $alertSuccess("Berhasil Memperbarui Password");
            echo $refresh(2, "?page=profil");
        }
    } else {
        $alert = $alertDanger("Password Lama salah");
        echo $refresh(2, "?page=profil");
    }
}

$datasiswa = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_siswa WHERE id_user='$id_user'"));

$dataguru = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_guru WHERE id_user='$id_user'"));



?>


<h4>Profil</h4>
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <?php echo @$alert; ?>
        <div class="row">
            <div class="col-lg-3">

                <?php
                if ($user['foto'] == '') {
                ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-thumnail w-100 p-2 bg-secondary" alt="">
                <?php
                } else {
                ?>
                    <img src="../img/user/<?php echo $user['foto'] ?>" alt="" class="img-thumnail w-100">
                <?php } ?>
            </div>
            <div class="col-lg-9">
                <?php
                if ($user['level'] == 'siswa') {

                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Foto Profil</label>
                                <input type="file" name="foto" class="form-control mb-3 mt-2 p-2">
                                <label for="">Nama</label>
                                <input type="text" name="nama" value="<?php echo $user['nama'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Angkatan</label>
                                <input type="number" value="<?php echo $datasiswa['angkatan'] ?>" class="form-control p-2 mt-2 mb-3" disabled>

                            </div>
                            <div class="col-lg-6">
                                <label for="">NIS</label>
                                <input type="number" name="nis" value="<?php echo $datasiswa['nis'] ?>" class="form-control p-2 mt-2 mb-3" disabled>
                                <label for="">NISN</label>
                                <input type="number" name="nisn" value="<?php echo $datasiswa['nisn'] ?>" class="form-control p-2 mt-2 mb-3" disabled>
                                <label for="">No Wa</label>
                                <input type="number" name="no_wa" value="<?php echo $datasiswa['no_wa'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php echo $datasiswa['email'] ?>" class="form-control p-2 mt-2 mb-3">
                            </div>
                            <div class="col">
                                <button class="btn btn-warning text-light p-2 px-4" name="perbarui">Perbarui</button>
                                <a class="btn btn-secondary text-light p-2 px-4" data-bs-toggle="modal" data-bs-target="#gantipassword">Ganti Password</a>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Foto Profil</label>
                                <input type="file" name="foto" class="form-control mb-3 mt-2 p-2">
                                <label for="">Nama</label>
                                <input type="text" name="nama" value="<?php echo $user['nama'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">NIP</label>
                                <input type="number" name="nip" value="<?php echo $dataguru['nip'] ?>" class="form-control p-2 mt-2 mb-3">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Mata Pelajaran</label>
                                <input type="text" name="mapel" value="<?php echo $dataguru['mapel'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">No Wa</label>
                                <input type="number" name="no_wa" value="<?php echo $dataguru['no_wa'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php echo $dataguru['email'] ?>" class="form-control p-2 mt-2 mb-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" value="<?php echo $dataguru['alamat'] ?>" class="form-control p-2 mt-2 mb-3">
                            </div>
                            <div class="col">
                                <button class="btn btn-warning text-light p-2 px-4" name="perbaruiguru">Perbarui</button>
                                <a class="btn btn-secondary text-light p-2 px-4" data-bs-toggle="modal" data-bs-target="#gantipassword">Ganti Password</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="gantipassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <label for="">Password Lama</label>
                    <input type="text" name="passwordLama" class="form-control mb-3 mt-2 p-2">
                    <label for="">Password Baru</label>
                    <input type="text" name="passwordBaru" class="form-control mb-3 mt-2 p-2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-warning text-light" name="simpanpassword">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>