<?php

if (!empty($_GET['id'])) {
    $data = mysqli_fetch_array($query("artikel", "id_artikel", $_GET['id']));
    unlink("../img/artikel/$data[gambar]");

    $hapus("artikel", "id_artikel", $_GET['id']);
    echo $refresh(0, "?page=artikel");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Artikel</h3>
    <a href="?page=tambah_artikel" class="btn btn-warning text-white btn-sm">Tambah Artikel</a>
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
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach (artikel($id_user) as $data) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo substr($data['judul'], 0, 50) . "..." ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td>

                                <?php
                                if ($data['status'] == 0) {
                                    echo '<i class="bx bx-sm bxs-x-circle text-danger"></i>';
                                } elseif ($data['status'] == 1) {
                                    echo '<i class="bx bx-sm bxs-check-circle text-success"></i>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="?page=ubah_artikel&&id=<?php echo $data['id_artikel'] ?>" class="btn btn-secondary btn-sm">Ubah</a>
                                <a href="" class="btn btn-warning text-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data['id_artikel'] ?>">Detail</a>


                                <div class=" modal fade" id="detail<?php echo $data['id_artikel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Artikel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body py-3">
                                                <h1><?php echo $data['judul'] ?></h1>
                                                <p><?php echo $data['tanggal'] ?></p>
                                                <br>
                                                <img src="../img/artikel/<?php echo $data['gambar'] ?>" alt="gambar" class="w-100 mb-3">
                                                <?php echo $data['keterangan'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <a class="btn btn-danger  btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_artikel'] ?>">Hapus</a>
                                <div class=" modal fade" id="hapus<?php echo $data['id_artikel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Artikel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus Artikel <br> <b>"<?php echo $data['judul'] ?>"</b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=artikel&&id=<?php echo $data['id_artikel'] ?>" class="btn btn-danger">Hapus</a>

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