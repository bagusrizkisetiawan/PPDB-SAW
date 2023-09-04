<div class="row mt-4    ">
    <div class="col-lg-12">
        <div class="card card-dashboard-warning border-0 shadow-sm">
            <div class="card-body p-5">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <p>Selamat datang <b><?php echo $user['nama'] ?></b></p>
                        <h5>Di halaman Dashboard SMK Pangudi Luhur</h5>
                    </div>
                    <div class="col-auto d-flex">
                        <i class="bx bx-user-pin bx-lg text-secondary icon-dashboard align-self-center"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="mb-3 mt-5">Pengumuman</h4>
<?php

$q = mysqli_query($conn, "SELECT * FROM pengumuman a LEFT JOIN user b ON a.id_user=b.id_user ORDER BY id_pengumuman DESC");
while ($d = mysqli_fetch_array($q)) {

?>
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body p-4">

            <a href="?page=detail_pengumuman&&id=<?php echo $d['id_pengumuman'] ?>" class="text-decoration-none link-dark">
                <div class="">
                    <h5><?php echo substr($d['judul'], 0, 100) . "...." ?></h5>
                    <span class="text-secondary small"><i class="bx bx-user"></i> <?php echo $d['nama'] ?></span>
                    <span class="text-secondary small ms-3"><i class="bx bx-calendar"></i> <?php echo $d['tanggal'] ?></span>
                </div>
            </a>
        </div>

    </div>
<?php } ?>