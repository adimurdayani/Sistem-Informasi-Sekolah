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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($get_tentang_total == 0) : ?>
                                <?= form_open('tentang/tambah') ?>
                                <button type="submit" class="btn btn-outline-success float-right simpan"><i class="fe-save"></i> Simpan</button>
                                <h4 class="header-title">Form Input Data</h4>
                                <p class="sub-header">Isi konten tentang website anda pada form di bawah</p>

                                <!-- basic summernote-->
                                <div class="form-group mb-3">
                                    <label for="judul">Judul <span class="text-danger">*</span></label>
                                    <input type="text" id="judul" name="judul" value="<?= set_value('judul') ?>" class="form-control" require>
                                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group mb-3">
                                    <textarea name="isi" class="form-control" rows="5"></textarea>
                                    <?= form_error('isi', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <?= form_close() ?>

                            <?php else : ?>
                                <?= form_open('tentang/edit') ?>
                                <button type="submit" class="btn btn-outline-success float-right simpan"><i class="fe-save"></i> Simpan</button>
                                <h4 class="header-title">Form Input Data</h4>
                                <p class="sub-header">Isi konten tentang website anda pada form di bawah</p>

                                <!-- basic summernote-->
                                <input type="hidden" id="id" name="id" value="<?= $get_tentang->id ?>">
                                <div class="form-group mb-3">
                                    <label for="judul">Judul <span class="text-danger">*</span></label>
                                    <input type="text" id="judul" name="judul" value="<?= $get_tentang->judul ?>" class="form-control" require>
                                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group mb-3">
                                    <textarea id="content" name="isi" class="form-control"><?= $get_tentang->isi ?></textarea>
                                    <?= form_error('isi', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <?= form_close() ?>

                            <?php endif ?>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->