<div class="row">
    <div class="col-lg-6">
        <a href="" class="text-decoration-none text-white">
            <h2>SMK PANG <span class="text-warning">SMART</span></h2>
        </a>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <i class="bx bx-map-pin bx-md text-warning"></i>
                    </div>
                    <div class="col-10">
                        <p class="text-white small">
                            Jl. Syam Ratulangi, Rejosari Mataram, Kec. Seputih
                            Mataram
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <i class="bx bx-time bx-md text-danger"></i>
                    </div>
                    <div class="col-10">
                        <p class="text-white small">
                            Senin - Sabtu 07:15-14:00 <br />
                            Minggu Libur
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- nav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary r-30">
    <div class="w-100 px-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=jurusan">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=artikel">Artikel</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <form action="">
                        <div class="search border-secondary d-flex justify-content-between r-30">
                            <input type="text" name="search" class="ms-2 bg-light" placeholder="Search" required>
                            <button><i class="bx fw-bold bx-search text-secondary"></i></button>
                        </div>
                    </form>
                </li>
                <?php
                if (!empty($id_user)) {
                ?>
                    <li class="nav-item dropstart">
                        <?php
                        if ($user['foto'] == '') {
                        ?>
                            <a class="nav-link img-profil ms-0 mt-2 mt-lg-0" style="background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png') ;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                        <?php } elseif ($user['foto'] != '') {
                        ?>
                            <a class="nav-link img-profil ms-0 mt-2 mt-lg-0" style="background-image: url('img/user/<?php echo $user['foto'] ?>') ;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                        <?php
                        }
                        ?>
                        <ul class="dropdown-menu">
                            <li class="p-3">
                                <?php echo $user['nama'] ?>
                                <small class=" text-secondary mb-0">
                                    ( <?php echo $user['level'] ?> )
                                </small>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="pe-5"><a class="dropdown-item bg-white link-secondary py-2 pe-5" href="user/"><i class="bx bx-home"></i> Dashboard</a></li>
                            <li class="pe-5"><a class="dropdown-item bg-white link-secondary py-2 pe-5" href="user/?page=profil"><i class='bx bx-user-circle'></i> Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item bg-white link-secondary" href="user/logout.php"><i class="bx bx-log-out"></i> Logout</a></li>
                        </ul>
                    </li>

                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a href="login.php
                    " class="btn btn-warning text-white mt-2 mt-lg-0 r-30 px-4">Masuk</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- end nav -->