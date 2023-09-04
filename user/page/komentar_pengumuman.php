<?php

if (!empty($_GET['id'])) {

    $hapus("komentar", "id_komentar", $_GET['id']);
    echo $refresh(0, "?page=komentar_pengumuman");
}

if (isset($_POST['ubah_komentar'])) {
    $id = $_POST['id'];
    $komentar = $_POST['komentar'];

    mysqli_query($conn, "UPDATE komentar_pengumuman SET komentar ='$komentar' WHERE id_komentar='$id'");
    echo $refresh(0, "?page=komentar_pengumuman");
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Komentar Pengumuman</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pengumuman</th>
                        <th>Komentar</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT a.tanggal as tanggalk, b.tanggal as tanggalp , a.*, b.* FROM komentar_pengumuman a LEFT JOIN pengumuman b ON a.id_pengumuman=b.id_pengumuman WHERE a.id_user='$id_user'");
                    while ($data = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggalk'] ?></td>
                            <td><?php echo substr($data['judul'], 0, 30) . "..." ?></td>
                            <td><?php echo $data['komentar'] ?></td>
                            <td>
                                <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['id_komentar'] ?>">Ubah</a>

                                <div class="modal fade" id="ubah<?php echo $data['id_komentar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Komentar</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_komentar'] ?>">
                                                    <input type="text" name="komentar" placeholder="Masukan Komentar" value="<?php echo $data['komentar'] ?>" class="form-control p-2" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button name="ubah_komentar" class="btn btn-warning text-light">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a href="" class="btn btn-warning text-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data['id_komentar'] ?>">Detail</a>


                                <div class=" modal fade" id="detail<?php echo $data['id_komentar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Komentar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body py-3">
                                                <h1><?php echo $data['judul'] ?></h1>
                                                <p><?php echo $data['tanggalp'] ?></p>


                                                <?php echo $data['pengumuman'] ?>


                                                <!-- komentar -->
                                                <div class="card mt-4">
                                                    <div class="card-body">
                                                        <h5>Komentar</h5>
                                                        <?php
                                                        $a = -2;
                                                        $query_k = mysqli_query($conn, "SELECT * FROM komentar_pengumuman a LEFT JOIN user b ON a.id_user=b.id_user WHERE id_pengumuman='$data[id_pengumuman]'");
                                                        while ($komentar = mysqli_fetch_array($query_k)) {
                                                        ?>
                                                            <div class="d-flex mt-3 <?php if ($data['id_komentar'] == $komentar['id_komentar']) {
                                                                                        echo "bg-light";
                                                                                    } ?> p-2 rounded">
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
                                                <!-- end komentar -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <a class="btn btn-danger  btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_komentar'] ?>">Hapus</a>
                                <div class=" modal fade" id="hapus<?php echo $data['id_komentar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Komentar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus komentar <br> <b>"<?php echo $data['komentar'] ?>"</b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=komentar&&id=<?php echo $data['id_komentar'] ?>" class="btn btn-danger">Hapus</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>