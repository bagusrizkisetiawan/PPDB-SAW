<?php

if (!empty($_GET['id'])) {
    $data = mysqli_fetch_array($query("pengumuman", "id_pengumuman", $_GET['id']));
    unlink("../img/pengumuman/$data[gambar]");

    $hapus("pengumuman", "id_pengumuman", $_GET['id']);
    echo $refresh(0, "?page=pengumuman");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Pengumuman</h3>
    <a href="?page=tambah_pengumuman" class="btn btn-warning text-white btn-sm">Tambah pengumuman</a>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>tanggal</th>
                        <th width='160'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_user='$id_user' ORDER BY id_pengumuman DESC");
                    while ($data = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo substr($data['judul'], 0, 50) . "..." ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td>
                                <a href="?page=ubah_pengumuman&&id=<?php echo $data['id_pengumuman'] ?>" class="btn btn-secondary btn-sm">Ubah</a>
                                <a href="" class="btn btn-warning text-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data['id_pengumuman'] ?>">Detail</a>


                                <div class=" modal fade" id="detail<?php echo $data['id_pengumuman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pengumuman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body py-3">
                                                <h1><?php echo $data['judul'] ?></h1>
                                                <p><?php echo $data['tanggal'] ?></p>
                                                <br>
                                                <?php echo $data['pengumuman'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <a class="btn btn-danger  btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_pengumuman'] ?>">Hapus</a>
                                <div class=" modal fade" id="hapus<?php echo $data['id_pengumuman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus pengumuman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus pengumuman <br> <b>"<?php echo $data['judul'] ?>"</b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=pengumuman&&id=<?php echo $data['id_pengumuman'] ?>" class="btn btn-danger">Hapus</a>

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