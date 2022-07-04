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
                                <li class="breadcrumb-item"><a href="<?= base_url('alumni') ?>">Alumni</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?= form_open('alumni/tambah') ?>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive">

                            <h4 class="header-title mb-2">Data Alumni</h4>
                            <div class="form-group">
                                <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                <input type="text" name="tahun" class="form-control" placeholder="Input tahun" required>
                                <small class="text-danger"><?= form_error('tahun') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah <span class="text-danger">*</span></label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Input jumlah" value="0" required>
                                <small class=" text-danger"><?= form_error('jumlah') ?></small>
                            </div>


                            <button type="submit" class="btn btn-success float-right mb-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('alumni') ?>" class="btn btn-secondary float-right mb-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= form_close() ?>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->