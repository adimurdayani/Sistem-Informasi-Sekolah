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
                                <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">siswa</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?= form_open() ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">Data Siswa</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_siswa" value="<?= $get_siswa['id_siswa'] ?>">
                                    <div class="form-group">
                                        <label for="">NIS <span class="text-danger">*</span></label>
                                        <input type="number" name="nis_nasional" class="form-control" placeholder="Input nis nasional" value="<?= $get_siswa['nis_nasional'] ?>" required>
                                        <small class="text-danger"><?= form_error('nis_nasional') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Input nama" value="<?= $get_siswa['nama'] ?>" required>
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" id="" class="form-control" required>
                                            <option value="">-- Pilih jenis kelamin --</option>
                                            <option value="Perempuan" <?php if ($get_siswa['jenis_kelamin'] == "Perempuan") : ?>selected<?php endif; ?>>Perempuan</option>
                                            <option value="Laki-Laki" <?php if ($get_siswa['jenis_kelamin'] == "Laki-Laki") : ?>selected<?php endif; ?>>Laki-Laki</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Input tempat lahir" value="<?= $get_siswa['tempat_lahir'] ?>" required>
                                                <small class="text-danger"><?= form_error('tempat_lahir') ?></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Input tanggal lahir" value="<?= $get_siswa['tanggal_lahir'] ?>" required>
                                                <small class="text-danger"><?= form_error('tanggal_lahir') ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Agama <span class="text-danger">*</span></label>
                                        <select name="agama" id="" class="form-control" required>
                                            <option value="">-- Pilih agama --</option>
                                            <option value="Kristen" <?php if ($get_siswa['agama'] == "Kristen") : ?>selected<?php endif; ?>>Kristen</option>
                                            <option value="Hindu" <?php if ($get_siswa['agama'] == "Hindu") : ?>selected<?php endif; ?>>Hindu</option>
                                            <option value="Islam" <?php if ($get_siswa['agama'] == "Islam") : ?>selected<?php endif; ?>>Islam</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" class="form-control" rows="5" required><?= $get_siswa['alamat'] ?></textarea>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Anak Ke <span class="text-danger">*</span></label>
                                        <input type="number" name="anak_ke" class="form-control" value="<?= $get_siswa['anak_ke'] ?>" placeholder="Input anak ke" required>
                                        <small class="text-danger"><?= form_error('anak_ke') ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tahun Masuk <span class="text-danger">*</span></label>
                                                <input type="number" name="tahun_masuk" class="form-control" value="<?= $get_siswa['tahun_masuk'] ?>" placeholder="Input tahun masuk" required>
                                                <small class="text-danger"><?= form_error('tahun_masuk') ?></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tahun Keluar <span class="text-danger">*</span></label>
                                                <input type="number" name="tahun_keluar" class="form-control" value="<?= $get_siswa['tahun_keluar'] ?>" placeholder="Input tahun keluar" required>
                                                <small class="text-danger"><?= form_error('tahun_keluar') ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email Orang Tua <span class="text-danger">*</span></label>
                                        <input type="email" name="email_ortu" class="form-control" value="<?= $get_siswa['email_ortu'] ?>" placeholder="Input email" required>
                                        <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alasan keluar <span class="text-danger">*</span></label>
                                        <textarea name="alasan_keluar" class="form-control" rows="5" required><?= $get_siswa['alasan_keluar'] ?></textarea>
                                        <small class="text-danger"><?= form_error('alasan_keluar') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori user <span class="text-danger">*</span></label>
                                        <select name="id_user" id="id_user" class="form-control" required>
                                            <option value="">-- Pilih kategori user --</option>
                                            <?php foreach ($get_group as $grup) : ?>
                                                <option value="<?= $grup['id'] ?>" <?php if ($get_siswa['id_user'] == $grup['id']) : ?>selected<?php endif; ?>><?= $grup['description'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_user') ?></small>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">Data Orang Tua</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-center">Bapak</h4>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="text-center">Ibu</h4>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Bapak <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_bapak" class="form-control" placeholder="Input nama" value="<?= $get_siswa['nama_bapak'] ?>" required>
                                        <small class="text-danger"><?= form_error('nama_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pekerjaan Bapak <span class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan_bapak" class="form-control" placeholder="Input pekerjaan" value="<?= $get_siswa['pekerjaan_bapak'] ?>" required>
                                        <small class="text-danger"><?= form_error('pekerjaan_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pendidikan Bapak <span class="text-danger">*</span></label>
                                        <select name="pendidikan_bapak" id="" class="form-control" required>
                                            <option value="">-- Pilih pendidikan --</option>
                                            <option value="SD" <?php if ($get_siswa['pendidikan_bapak'] == "SD") : ?>selected<?php endif; ?>>SD</option>
                                            <option value="SMP" <?php if ($get_siswa['pendidikan_bapak'] == "SMP") : ?>selected<?php endif; ?>>SMP</option>
                                            <option value="SMA" <?php if ($get_siswa['pendidikan_bapak'] == "SMA") : ?>selected<?php endif; ?>>SMA</option>
                                            <option value="S1" <?php if ($get_siswa['pendidikan_bapak'] == "S1") : ?>selected<?php endif; ?>>S1</option>
                                            <option value="S2" <?php if ($get_siswa['pendidikan_bapak'] == "S2") : ?>selected<?php endif; ?>>S2</option>
                                            <option value="S3" <?php if ($get_siswa['pendidikan_bapak'] == "S3") : ?>selected<?php endif; ?>>S3</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat Bapak <span class="text-danger">*</span></label>
                                        <textarea name="alamat_bapak" class="form-control" rows="5" required><?= $get_siswa['alamat_bapak'] ?></textarea>
                                        <small class="text-danger"><?= form_error('alamat_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Telepon Bapak <span class="text-danger">*</span></label>
                                        <input type="number" name="telp_bapak" class="form-control" value="<?= $get_siswa['telp_bapak'] ?>" required placeholder="Input nomor telepon">
                                        <small class="text-danger"><?= form_error('telp_bapak') ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Nama ibu <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_ibu" class="form-control" value="<?= $get_siswa['nama_ibu'] ?>" placeholder="Input nama" required>
                                        <small class="text-danger"><?= form_error('nama_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pekerjaan ibu <span class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan_ibu" class="form-control" value="<?= $get_siswa['pekerjaan_ibu'] ?>" placeholder="Input pekerjaan" required>
                                        <small class="text-danger"><?= form_error('pekerjaan_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pendidikan ibu <span class="text-danger">*</span></label>
                                        <select name="pendidikan_ibu" id="" class="form-control" required>
                                            <option value="">-- Pilih pendidikan --</option>
                                            <option value="SD" <?php if ($get_siswa['pendidikan_ibu'] == "SD") : ?>selected<?php endif; ?>>SD</option>
                                            <option value="SMP" <?php if ($get_siswa['pendidikan_ibu'] == "SMP") : ?>selected<?php endif; ?>>SMP</option>
                                            <option value="SMA" <?php if ($get_siswa['pendidikan_ibu'] == "SMA") : ?>selected<?php endif; ?>>SMA</option>
                                            <option value="S1" <?php if ($get_siswa['pendidikan_ibu'] == "S1") : ?>selected<?php endif; ?>>S1</option>
                                            <option value="S2" <?php if ($get_siswa['pendidikan_ibu'] == "S2") : ?>selected<?php endif; ?>>S2</option>
                                            <option value="S3" <?php if ($get_siswa['pendidikan_ibu'] == "S3") : ?>selected<?php endif; ?>>S3</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat ibu <span class="text-danger">*</span></label>
                                        <textarea name="alamat_ibu" class="form-control" rows="5" required><?= $get_siswa['alamat_ibu'] ?></textarea>
                                        <small class="text-danger"><?= form_error('alamat_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Telepon ibu <span class="text-danger">*</span></label>
                                        <input type="number" name="telp_ibu" class="form-control" value="<?= $get_siswa['telp_ibu'] ?>" required placeholder="Input nomor telepon">
                                        <small class="text-danger"><?= form_error('telp_ibu') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">Data Wali</h4>

                            <div class="form-group">
                                <label for="">Nama wali <span class="text-danger">*</span></label>
                                <input type="text" name="nama_wali" class="form-control" value="<?= $get_siswa['nama_wali'] ?>" placeholder="Input nama">
                                <small class="text-danger"><?= form_error('nama_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Alamat wali <span class="text-danger">*</span></label>
                                <textarea name="alamat_wali" class="form-control" rows="5"><?= $get_siswa['alamat_wali'] ?></textarea>
                                <small class="text-danger"><?= form_error('alamat_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Telepon wali <span class="text-danger">*</span></label>
                                <input type="number" name="telp_wali" class="form-control" value="<?= $get_siswa['telp_wali'] ?>" placeholder="Input nomor telepon">
                                <small class="text-danger"><?= form_error('telp_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Hubungan wali <span class="text-danger">*</span></label>
                                <input type="text" name="hubungan_wali" class="form-control" value="<?= $get_siswa['hubungan_wali'] ?>" placeholder="Input hubungan wali">
                                <small class="text-danger"><?= form_error('hubungan_wali') ?></small>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->
            <button type="submit" class="btn btn-success float-right mb-4"><i class="fe-save"></i> Simpan</button>
            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary float-right mb-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
            <?= form_close() ?>

        </div> <!-- container -->

    </div> <!-- content -->