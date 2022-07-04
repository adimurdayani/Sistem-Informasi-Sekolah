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
                                <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Siswa</a></li>
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
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive">

                            <h4 class="header-title mb-2">Data Siswa</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_siswa" value="<?= $get_siswa['id_siswa'] ?>">
                                    <div class="form-group">
                                        <label for="">NIS <span class="text-danger">*</span></label>
                                        <input type="text" name="nis" class="form-control" placeholder="Input NIS" value="<?= $get_siswa['nis'] ?>">
                                        <small class="text-danger"><?= form_error('nis') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NISN <span class="text-danger">*</span></label>
                                        <input type="text" name="nis_nasional" class="form-control" placeholder="Input NISN" value="<?= $get_siswa['nis_nasional'] ?>">
                                        <small class="text-danger"><?= form_error('nis_nasional') ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Input nama" value="<?= $get_siswa['nama'] ?>">
                                <small class="text-danger"><?= form_error('nama') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="" class="form-control" required>
                                    <option value="">-- Pilih jenis kelamin --</option>
                                    <option value="Perempuan" <?php if ($get_siswa['jenis_kelamin'] == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
                                    <option value="Laki-Laki" <?php if ($get_siswa['jenis_kelamin'] == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
                                </select>
                                <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                            </div>


                            <button type="submit" class="btn btn-success float-right mb-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary float-right mb-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->
            <?= form_close() ?>

        </div> <!-- container -->

    </div> <!-- content -->