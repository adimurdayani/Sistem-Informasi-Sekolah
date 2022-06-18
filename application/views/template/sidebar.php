<?php $group = $this->db->get_where('users_groups', ['user_id' => $session->id])->row_array(); ?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <?php if ($group['group_id'] == 1) : ?>
                    <li class="menu-title">Navigasi</li>

                    <li>
                        <a href="<?= base_url('dashboard') ?>">
                            <i class="fe-grid"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="menu-title">Modul Data</li>

                <?php if ($group['group_id'] == 1) : ?>
                    <li>
                        <a href="#profile" data-toggle="collapse">
                            <i data-feather="monitor"></i>
                            <span> Profil </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="profile">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="<?= base_url('tentang') ?>">Tentang</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('visimisi') ?>">Visi dan Misi</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('sejarah') ?>">Sejarah</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="#layanan" data-toggle="collapse">
                        <i class="fe-database"></i>
                        <span> Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="layanan">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('guru') ?>">Guru</a>
                            </li>

                            <li>
                                <a href="<?= base_url('staf') ?>">Staf</a>
                            </li>

                            <li>
                                <a href="<?= base_url('siswa') ?>">Siswa</a>
                            </li>

                            <li>
                                <a href="<?= base_url('alumni') ?>">Alumni</a>
                            </li>

                            <?php if ($group['group_id'] == 1) : ?>
                                <li>
                                    <a href="#sidebarMultilevel2" data-toggle="collapse">
                                        Master <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMultilevel2">
                                        <ul class="nav-second-level">

                                            <li>
                                                <a href="<?= base_url('kelas/kelas_siswa') ?>">Kelas Siswa</a>
                                            </li>

                                            <li>
                                                <a href="<?= base_url('ajar') ?>">Ajar (Guru Bidang Studi)</a>
                                            </li>

                                            <li>
                                                <a href="<?= base_url('walikelas') ?>">Wali Kelas</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url('ekskul/data') ?>">
                        <i class="fe-list"></i>
                        <span> Ekstrakurikuler </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('jadwal') ?>">
                        <i class="fe-calendar"></i>
                        <span> Jadwal Pelajaran </span>
                    </a>
                </li>

                <li>
                    <a href="#banner" data-toggle="collapse">
                        <i class="fe-sliders"></i>
                        <span> Nilai</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="banner">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('nilai') ?>">Semester Ganjil</a>
                            </li>
                            <li>
                                <a href="<?= base_url('nilai/nilai_genap') ?>">Semester Genap</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <?php if ($group['group_id'] == 1) : ?>
                    <li>
                        <a href="#galeri" data-toggle="collapse">
                            <i class="fe-image"></i>
                            <span> Galeri</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="galeri">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="<?= base_url('galeri/kategori_galeri') ?>">Kategori Galeri</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('galeri') ?>">List Galeri</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('galeri/tambah') ?>">Post Galeri</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($group['group_id'] == 1) : ?>
                    <li class="menu-title">Pengaturan</li>

                    <!-- <li>
                        <a href="#konfig">
                            <i class="fe-user"></i>
                            <span> Profil</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="#user" data-toggle="collapse">
                            <i class="fe-users"></i>
                            <span> Users Manajemen</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="<?= base_url('user') ?>">Users</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('grup') ?>">Grup User</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <!-- <li>
                        <a href="<?= base_url('konfigurasi') ?>">
                            <i class="fe-settings"></i>
                            <span> Konfigurasi</span>
                        </a>
                    </li> -->
                <?php endif; ?>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->