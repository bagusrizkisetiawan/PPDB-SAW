<?php

if (!empty($_GET['id'])) {
    $hapus("user", "id_user", $_GET['id']);
    $hapus("data_guru", "nip", $_GET['nip']);
    echo $refresh(0, "?page=guru");
}


?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Data Guru</h3>
    <a href="?page=tambah_guru" class="btn btn-warning text-light btn-sm">Tambah Guru</a>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th width='120'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_guru b ON a.id_user=b.id_user WHERE level='guru'");
                    while ($d = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $d['nip'] ?></td>
                            <td><?php echo $d['nama'] ?></td>
                            <td><?php echo $d['mapel'] ?></td>
                            <td>
                                <a href="?page=ubah_guru&&id=<?php echo $d['id_user'] ?>" class="btn btn-secondary btn-sm">Ubah</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $d['id_user'] ?>">Hapus</a>
                                <div class="modal fade" id="hapus<?php echo $d['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus Guru <br> <b><?php echo $d['nama'] ?> (<?php echo $d['mapel'] ?>)</b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=guru&&id=<?php echo $d['id_user'] ?>&&nip=<?php echo $d['nip'] ?>" class="btn btn-danger">Hapus</a>

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