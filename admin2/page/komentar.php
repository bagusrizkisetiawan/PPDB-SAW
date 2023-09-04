<?php

if (!empty($_GET['id_komentar_artikel'])) {

    $hapus("komentar", "id_komentar", $_GET['id']);
    echo $refresh(0, "?page=komentar");
}

if (!empty($_GET['id_komentar_pengumuman'])) {

    $hapus("komentar_pengumuman", "id_komentar", $_GET['id']);
    echo $refresh(0, "?page=komentar");
}


?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Komentar</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header">
        <p class="fw-normal mb-0">Komentar Artikel</p>
    </div>
    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Artikel</th>
                        <th>By</th>
                        <th>Komentar</th>
                        <th width="60">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT a.tanggal as tanggalk, b.tanggal as tanggala , a.*, b.*, c.* FROM komentar a LEFT JOIN artikel b ON a.id_artikel=b.id_artikel LEFT JOIN user c on a.id_user=c.id_user ORDER BY id_komentar DESC");
                    while ($data = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggalk'] ?></td>
                            <td><?php echo substr($data['judul'], 0, 30) . "..." ?></td>
                            <td><?php echo $data['nama'] ?> ( <?php echo $data['level'] ?> )</td>
                            <td><?php echo $data['komentar'] ?></td>
                            <td>

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
                                                <a href="?page=id_komentar_artikel&&id=<?php echo $data['id_komentar'] ?>" class="btn btn-danger">Hapus</a>

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



<div class="card border-0 my-4 shadow-sm">
    <div class="card-header">
        <p class="fw-normal mb-0">Komentar Pengumuman</p>
    </div>
    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable-2" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pengumuman</th>
                        <th>By</th>
                        <th>Komentar</th>
                        <th width="60">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT a.tanggal as tanggalk, b.tanggal as tanggalp , a.*, b.*, c.* FROM komentar_pengumuman a LEFT JOIN pengumuman b ON a.id_pengumuman=b.id_pengumuman LEFT JOIN user c on a.id_user=c.id_user ORDER BY id_komentar DESC");
                    while ($data = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggalk'] ?></td>
                            <td><?php echo substr($data['judul'], 0, 30) . "..." ?></td>
                            <td><?php echo $data['nama'] ?> ( <?php echo $data['level'] ?> )</td>
                            <td><?php echo $data['komentar'] ?></td>

                            <td>

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
                                                <a href="?page=id_komentar_pengumuman&&id=<?php echo $data['id_komentar'] ?>" class="btn btn-danger">Hapus</a>

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