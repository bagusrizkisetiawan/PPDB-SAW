<?php

if (!empty($_GET['id'])) {
    $hapus("data_guru", "nip", $_GET['nip']);
    $hapus("user", "id_user", $_GET['id']);
    echo $refresh(0, "?page=guru");
}


?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Data Siswa</h3>
    <a href="?page=tambah_siswa" class="btn btn-warning text-light btn-sm">Tambah Siswa</a>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th width='180'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT * FROM user a LEFT JOIN data_siswa b ON a.id_user=b.id_user LEFT JOIN jurusan c ON b.id_jurusan=c.id_jurusan  WHERE level='siswa'");
                    while ($d = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $d['nis'] ?></td>
                            <td><?php echo $d['nama'] ?></td>
                            <td><?php echo $d['nama_jurusan'] ?></td>
                            <td><?php echo $d['angkatan'] ?></td>
                            <td>
                                <a href="?page=ubah_siswa&&id=<?php echo $d['id_user'] ?>" class="btn btn-secondary btn-sm">Ubah</a>

                                <a href="" class="btn btn-warning text-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $d['id_user'] ?>">Details</a>
                                <div class="modal fade" id="detail<?php echo $d['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Details Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <tr>
                                                        <th class="small">Foto</th>
                                                        <th class="small">NIS</th>
                                                        <th class="small">NISN</th>
                                                        <th class="small">Nama</th>
                                                        <th class="small">Jurusan</th>
                                                        <th class="small">Angkatan</th>
                                                        <th class="small">No WA</th>
                                                        <th class="small">Email</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="small"><?php echo $d['id_siswa'] ?></td>
                                                        <td class="small"><?php echo $d['nis'] ?></td>
                                                        <td class="small"><?php echo $d['nisn'] ?></td>
                                                        <td class="small"><?php echo $d['nama'] ?></td>
                                                        <td class="small"><?php echo $d['nama_jurusan'] ?></td>
                                                        <td class="small"><?php echo $d['angkatan'] ?></td>
                                                        <td class="small"><?php echo $d['no_wa'] ?></td>
                                                        <td class="small"><?php echo $d['email'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $d['id_user'] ?>">Hapus</a>
                                <div class="modal fade" id="hapus<?php echo $d['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin Ingin Menghapus Siswa <br> <b><?php echo $d['nama'] ?> (<?php echo $d['jurusan'] ?>)</b>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=siswa&&id=<?php echo $d['id_user'] ?>&&nis=<?php echo $d['nis'] ?>" class="btn btn-danger">Hapus</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>