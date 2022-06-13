<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $title; ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?= $title ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Galeri</h6>
            <h1 class="mb-4">Galeri Kegiatan SMA Negeri 7 Luwu Timur</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    <?php foreach ($get_kategori as $kategori) : ?>
                        <li class="mx-2" data-filter=".<?= $kategori->id ?>"><?= $kategori->kategori ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">

            <?php foreach ($get_kategori as $kat) : ?>
                <?php
                $kategori_id = $kat->id;
                $query = "SELECT `tb_galeri`.*,`tb_katgaleri`.`kategori`
                            FROM `tb_galeri` 
                            JOIN `tb_katgaleri` ON `tb_galeri`.`kategori_id` = `tb_katgaleri`.`id`
                            WHERE `tb_galeri`.`kategori_id` = $kategori_id
                            ";
                $galeri = $this->db->query($query)->result();
                ?>
                <?php foreach ($galeri as $g) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item <?= $g->kategori_id ?>">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('assets/backend/images/galeri/') . $g->img_galeri ?>" alt="<?= $g->img_galeri ?>">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/backend/images/galeri/') . $g->img_galeri ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/backend/images/galeri/') . $g->img_galeri ?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="pt-3">
                            <p class="text-primary mb-0">Solar Panels</p>
                            <hr class="text-primary w-25 my-2">
                            <h5 class="lh-base"><?= $g->keterangan ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Projects End -->