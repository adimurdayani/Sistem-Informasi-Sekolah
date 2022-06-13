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

            <?= form_open_multipart('galeri/update') ?>
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title">Form Input Data</h4>
                            <p class="sub-header">Isi konten galeri anda pada form di bawah</p>

                            <!-- basic summernote-->
                            <input type="hidden" name="id" value="<?= $get_galeri->id ?>">
                            <div class="form-group mb-3">
                                <label for="kategori_id">Kategori <span class="text-danger">*</span></label>
                                <select id="kategori_id" name="kategori_id" class="form-control">
                                    <?php foreach ($get_kategori as $kategori) : ?>
                                        <option value="<?= $kategori->id ?>" <?php if ($get_galeri->kategori_id == $kategori->id) : ?> selected <?php endif; ?>><?= $kategori->kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <textarea id="content" name="keterangan" class="form-control"><?= $get_galeri->keterangan ?></textarea>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

                <div class="col-5">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <button type="submit" class="btn btn-outline-warning float-right "><i class="fe-upload"></i> Update Post</button>
                            <h4 class="header-title mb-3">Gambar Berita</h4>

                            <div class="form-group mb-3">
                                <label>Upload Gambar Berita</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input input1" id="img_galeri" name="img_galeri">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <img src="<?= base_url('assets/backend/images/galeri/') . $get_galeri->img_galeri ?>" alt="" width="50%" class="img-thumbnail mt-2">
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div> <!-- container -->
            <?= form_close() ?>

        </div> <!-- container -->

    </div> <!-- content -->