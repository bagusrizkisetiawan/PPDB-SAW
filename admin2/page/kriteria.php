<?php

if (!empty($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM kriteria_spk WHERE id_kriteria = '$_GET[id]'");
    echo $refresh(0, "?page=kriteria");
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Kriteria SPK</h3>
    <a href="?page=tambah_kriteria" class="btn btn-warning text-light btn-sm">Tambah Kriteria</a>
</div>

<div class="card">

    <div class="card-body">
        <div class="table-responsive p-2">
            <table class="table py-3" id="dataTable">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Jarak Rumah</th>
                        <th>MTK</th>
                        <th>IPA</th>
                        <th>Inggris</th>
                        <th>indonesia</th>
                        <th>Agama</th>
                        <th>PPKN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM kriteria_spk a LEFT JOIN jurusan b ON a.id_jurusan = b.id_jurusan");
                    while ($d = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <td><?php echo $d['nama_jurusan'] ?></td>
                            <td><?php echo $d['jarak_rumah'] ?></td>
                            <td><?php echo $d['mtk'] ?></td>
                            <td><?php echo $d['ipa'] ?></td>
                            <td><?php echo $d['inggris'] ?></td>
                            <td><?php echo $d['indonesia'] ?></td>
                            <td><?php echo $d['agama'] ?></td>
                            <td><?php echo $d['ppkn'] ?></td>
                            <td width='120'>
                                <a href="?page=edit_kriteria&&id=<?php echo $d['id_kriteria'] ?>" class="btn btn-secondary btn-sm ">Ubah</a>
                                <a href="?page=kriteria&&id=<?php echo $d['id_kriteria'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>