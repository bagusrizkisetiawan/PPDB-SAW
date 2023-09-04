<h4>Dashboard</h4>
<div class="row mt-4    ">
    <div class="col-lg-3">
        <div class="card card-dashboard-warning border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h1><?php echo $numRowsUser("siswa") ?></h1>
                        <p class="text-secondary mb-0">Siswa</p>
                    </div>
                    <div class="col-auto d-flex">
                        <i class="bx bxs-user-account bx-lg text-secondary icon-dashboard align-self-center"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-dashboard-success border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h1><?php echo $numRowsUser("guru") ?></h1>
                        <p class="text-secondary mb-0">Guru</p>
                    </div>
                    <div class="col-auto d-flex">
                        <i class="bx bx-user bx-lg text-secondary icon-dashboard align-self-center"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-dashboard-primary border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h1><?php echo $numRows("pengumuman") ?></h1>
                        <p class="text-secondary mb-0">Pengumuman</p>
                    </div>
                    <div class="col-auto d-flex">
                        <i class="bx bx-chat bx-lg text-secondary icon-dashboard align-self-center"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-dashboard-danger border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h1><?php echo $numRows("artikel") ?></h1>
                        <p class="text-secondary mb-0">Artikel</p>
                    </div>
                    <div class="col-auto d-flex">
                        <i class="bx bx-book-open bx-lg text-secondary icon-dashboard align-self-center"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card border-0 shadow-sm my-4">
    <div class="card-header py-3 bg-white">
        <p class="mb-0 text-center">Grafik siswa 5 tahun terakhir</p>
    </div>
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>