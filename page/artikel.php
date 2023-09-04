<!-- artikel -->
<div class="container py-5">
    <div class="text-center py-5">

        <h2> Artikel Terbaru</h2>

    </div>
    <div class="row">
        <?php

        $search = @$_GET['search'];
        if (!empty($search)) {
            $artikel = artikelSearch($search);
        } else {
            $artikel = artikelDESC();
        }

        foreach ($artikel as $data) {
        ?>
            <div class="col-lg-4 mb-3">
                <a href="?page=detail&&id=<?php echo $data['id_artikel'] ?>" class="card-artikel text-decoration-none">
                    <div class="card h-100 " data-aos="fade-up">
                        <div class="img-artikel card-img-top" style="background-image: url('img/artikel/<?php echo $data['gambar'] ?>');"></div>
                        <div class="card-body p-4">
                            <h6 class="card-title card-title-artikel text-warning fw-normal ">
                                <?php echo $data['judul'] ?>
                            </h6>
                            <div class="row justify-content-between mt-3 text-secondary xx-small">
                                <div class="col-auto">
                                    <i class="bx bx-user"></i> <?php echo $data['nama'] ?>
                                </div>
                                <div class="col-auto">
                                    <i class="bx bx-calendar"></i> <?php echo $data['tanggal'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- end artikel -->