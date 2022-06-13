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

<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="<?= base_url('assets/frontend') ?>/img/gambar_sekolah.webp" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">Tentang</h6>
                    <h1 class="mb-4">SMA Negeri 7 Luwu Timur</h1>
                    <p class="text-justify"><strong>SMAN 7 LUWU TIMUR</strong> adalah salah satu satuan pendidikan dengan jenjang SMA di Jalajja, Kec. Burau, Kab. Luwu Timur, Sulawesi Selatan. Dalam menjalankan kegiatannya, SMAN 7 LUWU TIMUR berada di bawah naungan Kementerian Pendidikan dan Kebudayaan.</p>
                    <strong>ALAMAT SMAN 7 LUWU TIMUR</strong>
                    <p class="text-text-justify">SMAN 7 LUWU TIMUR beralamat di JL. TRANS SULAWESI DS. JALAJJA, Jalajja, Kec. Burau, Kab. Luwu Timur, Sulawesi Selatan, dengan kode pos 92975.</p>
                    <h5>Identitas Sekolah</h5>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>NPSN : 40310153</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Status : Negeri</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Bentuk Pendidikan : SMA</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Status Kepemilikan : Pemerintah Daerah</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>SK Pendirian Sekolah : 96.A TAHUN 2004</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Tanggal SK Pendirian : 2004-05-05</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>SK Izin Operasional : 96.A TAHUN 2004</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Tanggal SK Izin Operasional : 2004-05-05</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Guru</h6>
            <h1 class="mb-4">Guru SMA Negeri Luwu Timur</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($get_guru as $guru) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="d-flex">
                            <img class="img-fluid w-75" src="<?= base_url('assets/frontend') ?>/img/user.png" alt="">
                            <div class="team-social w-25">
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5><?= $guru->nama ?></h5>
                            <span><?= $guru->alamat ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team End -->