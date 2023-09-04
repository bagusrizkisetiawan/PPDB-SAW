<?php

if (!empty($_GET['id'])) {
    $hapus("pendaftar_pmb", "id_pmb", $_GET['id']);
    echo $refresh(0, "?page=pendaftar");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pendaftar PMB</h1>
</div>

<div class="card">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Jurusan</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($conn, "SELECT * FROM pendaftar_pmb a LEFT jOIN jurusan b ON a.id_jurusan = b.id_jurusan");
                    while ($d = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nisn'] ?></td>
                            <td><?php echo $d['nama_jurusan'] ?></td>
                            <td><?php echo $d['nama'] ?></td>
                            <td><?php echo $d['email'] ?></td>
                            <td>
                                <a href="" class="btn btn-warning text-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $d['id_pmb'] ?>">lihat Nilai</a>
                                <div class="modal fade" id="detail<?php echo $d['id_pmb'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <tr>
                                                            <th class="small">NISN</th>
                                                            <th class="small">Jurusan</th>
                                                            <th class="small">Nama</th>
                                                            <th class="small">Email</th>
                                                            <th class="small">Jarak Rumah</th>
                                                            <th class="small">MTK</th>
                                                            <th class="small">IPA</th>
                                                            <th class="small">B.Inggris</th>
                                                            <th class="small">B.Indoenesia</th>
                                                            <th class="small">Agama</th>
                                                            <th class="small">PPKN</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="small"><?php echo $d['nisn'] ?></td>
                                                            <td class="small"><?php echo $d['nama_jurusan'] ?></td>
                                                            <td class="small"><?php echo $d['nama'] ?></td>
                                                            <td class="small"><?php echo $d['email'] ?></td>
                                                            <td class="small"><?php echo $d['jarak_rumah'] ?></td>
                                                            <td class="small"><?php echo $d['mtk'] ?></td>
                                                            <td class="small"><?php echo $d['ipa'] ?></td>
                                                            <td class="small"><?php echo $d['inggris'] ?></td>
                                                            <td class="small"><?php echo $d['indonesia'] ?></td>
                                                            <td class="small"><?php echo $d['agama'] ?></td>
                                                            <td class="small"><?php echo $d['ppkn'] ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $d['id_pmb'] ?>">Hapus</a>
                                <div class="modal fade" id="hapus<?php echo $d['id_pmb'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="text-danger mb-2">Apakah Anda yakin Ingin Menghapus data ini?</h6>
                                                <table class="table">
                                                    <tr>
                                                        <th class="small">NISN</th>
                                                        <th class="small">Jurusan</th>
                                                        <th class="small">Nama</th>
                                                        <th class="small">Email</th>

                                                    </tr>
                                                    <tr>
                                                        <td class="small"><?php echo $d['nisn'] ?></td>
                                                        <td class="small"><?php echo $d['nama_jurusan'] ?></td>
                                                        <td class="small"><?php echo $d['nama'] ?></td>
                                                        <td class="small"><?php echo $d['email'] ?></td>

                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="?page=pendaftar&&id=<?php echo $d['id_pmb'] ?>" class="btn btn-danger">Hapus</a>

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