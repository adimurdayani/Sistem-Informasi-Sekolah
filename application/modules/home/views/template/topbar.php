<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0 text-primary">SMA 7 LUWU TIMUR</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?= base_url('home') ?>" class="nav-item nav-link <?php if ($title == "Home") : ?> active <?php endif ?>">Home</a>

            <a href="<?= base_url('home/profile') ?>" class="nav-link <?php if ($title == "Profile") : ?> active <?php endif ?> ">Profile</a>

            <a href="<?= base_url('home/galeri') ?>" class="nav-item nav-link <?php if ($title == "Galeri") : ?> active <?php endif ?>">Galeri</a>

            <a href="<?= base_url('home/pendaftaran') ?>" class="nav-item nav-link <?php if ($title == "Pendaftaran") : ?> active <?php endif ?>">Pendaftaran</a>
        </div>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->