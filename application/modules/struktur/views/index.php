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
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Upload Gambar <?= $title ?></h4>
                            <p class="sub-header">
                                Anda dapat mengupload gambar struktur organisasi dengan cara mengisi form berikut.
                            </p>
                            <?php if ($get_struktur_total == 0) : ?>
                                <?= form_open_multipart('struktur/tambah') ?>
                                <div class="form-group mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-control">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Upload Gambar Struktur organisasi</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input input1" id="image" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <textarea class="form-control" rows="5" name="keterangan"></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <button type="submit" class="btn btn-outline-success"><i class="fe-save"></i> Simpan</button>
                                <?= form_close() ?>

                            <?php else : ?>
                                <?= form_open_multipart('struktur/edit') ?>
                                <input type="hidden" id="id" name="id" class="form-control" value="<?= $get_struktur->id ?>">
                                <div class="form-group mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-control" value="<?= $get_struktur->judul ?>">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Upload Gambar Struktur organisasi</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input input1" id="image" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <textarea id="content" name="keterangan"><?= $get_struktur->judul ?></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <button type="submit" class="btn btn-outline-warning"><i class="fe-save"></i> Update</button>
                                <?= form_close() ?>
                            <?php endif ?>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Gambar <?= $title ?></h4>
                            <?php if ($get_struktur_total != 0) : ?>
                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <center><img src="<?= base_url('assets/backend/images/upload/') . $get_struktur->image ?>" alt="" width="300px"></center>
                                    </div>
                                </div>
                                <a href="<?= base_url('struktur/hapus/') . $get_struktur->id ?>" class="btn btn-outline-danger hapus"><i class="fe-trash"></i> Hapus</a>
                            <?php else : ?>
                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <p>Tidak ada gambar yang diupload</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->