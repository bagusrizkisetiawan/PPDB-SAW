<?php

if (!empty($_GET['id'])) {
    $hapus("jurusan", "id_jurusan", $_GET['id']);
    echo $refresh(0, "?page=jurusan");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Jurusan</h3>
    <a href="?page=tambah_jurusan" class="btn btn-warning text-white btn-sm">Tambah Jurusan</a>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th width='120'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT * FROM jurusan");
                    while ($d = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $d['nama_jurusan'] ?></td>
                            <td>
                                <a href="?page=ubah_jurusan&&id=<?php echo $d['id_jurusan'] ?>" class="btn btn-secondary btn-sm">Ubah</a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $d['id_jurusan'] ?>">Hapus</a>
                                <div class="modal fade" id="hapus<?php echo $d['id_jurusan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Jurusan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus jurusan <b><?php echo $d['nama_jurusan'] ?></b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="?page=jurusan&&id=<?php echo $d['id_jurusan'] ?>" class="btn btn-danger">Hapus</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>