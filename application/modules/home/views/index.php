<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-users text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up"><?= $pengunjung_hariini ?></h1>
                </div>
                <h5 class="mb-3">Pengunjung Hari Ini</h5>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-award  text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up"><?= $total_pengunjung ?></h1>
                </div>
                <h5 class="mb-3">Total Pengunjung</h5>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-check text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up"><?= $pengunjung_online ?></h1>
                </div>
                <h5 class="mb-3">Pengunjung Online</h5>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-users-cog text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up"><?= $total_siswa ?></h1>
                </div>
                <h5 class="mb-3">Total Siswa</h5>
            </div>
        </div>
    </div>
</div>
<!-- Feature Start -->

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


<!-- Service Start -->
<!-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Our Services</h6>
            <h1 class="mb-4">We Are Pioneers In The World Of Renewable Energy</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-1.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-solar-panel fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Solar Panels</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-2.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-wind fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Wind Turbines</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-3.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-lightbulb fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Hydropower Plants</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-4.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-solar-panel fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Solar Panels</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-5.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-wind fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Wind Turbines</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/frontend') ?>/img/img-600x400-6.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-lightbulb fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Hydropower Plants</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Service End -->


<!-- Feature Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-lg-5 ps-lg-0">
                    <h6 class="text-primary">Why Choose Us!</h6>
                    <h1 class="mb-4">Complete Commercial & Residential Solar Systems</h1>
                    <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-lg-square bg-primary rounded-circle">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-0">Quality</p>
                                    <h5 class="mb-0">Services</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-lg-square bg-primary rounded-circle">
                                    <i class="fa fa-user-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-0">Expert</p>
                                    <h5 class="mb-0">Workers</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-lg-square bg-primary rounded-circle">
                                    <i class="fa fa-drafting-compass text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-0">Free</p>
                                    <h5 class="mb-0">Consultation</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-lg-square bg-primary rounded-circle">
                                    <i class="fa fa-headphones text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-0">Customer</p>
                                    <h5 class="mb-0">Support</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="margin-top: 90px;">
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="<?= base_url('assets/frontend/img/') ?>user.png" alt="Kepala sekolah">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/frontend/img/') ?>user.png" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/frontend/img/') ?>user.png"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">Kepala Sekolah</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

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


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Guru</h6>
            <h1 class="mb-4">Guru SMA Negeri Luwu Timur</h1>
        </div>
        <div class="row g-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Guru</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($get_guru as $guru) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $guru->nama ?></td>
                            <td><?= $guru->alamat ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- Team End -->