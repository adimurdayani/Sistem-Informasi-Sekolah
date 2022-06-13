<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url('galeri') ?>">Galeri</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Filter -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center filter-menu">
                        <a href="<?= base_url('galeri/detail/') . base64_encode($get_galeri->id) ?>" class="filter-menu-item active" data-rel="all">All</a>
                        <?php foreach ($get_kategori as $kategori) : ?>
                            <a href="javascript: void(0);" class="filter-menu-item" data-rel="<?= $kategori->id ?>"><?= $kategori->kategori ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- end row-->

            <div class="row filterable-content">

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
                        <div class="col-sm-6 col-xl-3 filter-item  <?= $g->kategori_id ?> illustrator">
                            <div class="gal-box">
                                <a href="<?= base_url('assets/backend/images/galeri/') . $g->img_galeri ?>" class="image-popup" title="<?= $g->img_galeri ?>">
                                    <img src="<?= base_url('assets/backend/images/galeri/') . $g->img_galeri ?>" class="img-fluid" alt="work-thumbnail">
                                </a>
                                <div class="gall-info">
                                    <h4 class="font-16 mt-0 mb-1"><?= $g->keterangan ?></h4>
                                    <a href="javascript: void(0);">
                                        <img src="<?= base_url('assets/backend/') ?>images/users/user-2.jpg" alt="user-img" class="rounded-circle" height="24" />
                                        <span class="text-muted ml-1"><?= $session->first_name ?></span>
                                    </a>
                                </div> <!-- gallery info -->
                            </div> <!-- end gal-box -->
                        </div> <!-- end col -->
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->