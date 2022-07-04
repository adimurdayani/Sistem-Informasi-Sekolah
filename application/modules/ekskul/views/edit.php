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
                                <li class="breadcrumb-item"><a href="<?= base_url('ekskul/data') ?>">Ekstrakurikuler</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2"><?= $title; ?></h4>

                            <?= form_open() ?>
                            <input type="hidden" name="id_nilaiekskul" value="<?= $get_nilai['id_nilaiekskul'] ?>">
                            <div class="form-group">
                                <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021" value="<?= $get_nilai['tahun_ajar'] ?>">
                                <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Ekskul <span class="text-danger">*</span></label>
                                <select name="id_ekskul" id="" class="form-control">
                                    <option value="">-- Pilih pelajaran --</option>
                                    <?php foreach ($get_ekskul as $ekskul) : ?>
                                        <option value="<?= $ekskul['id_ekskul'] ?>" <?php if ($get_nilai['id_ekskul'] == $ekskul['id_ekskul']) : ?>selected<?php endif; ?>><?= $ekskul['nm_ekskul'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_ekskul') ?></small>
                                <a href="<?= base_url('ekskul') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Ekskul</small></a>
                            </div>

                            <div class="form-group">
                                <label for="">Siswa <span class="text-danger">*</span></label>
                                <div class="form-input">
                                    <div class="input-group-prepend">
                                        <input type="text" class="form-control" id="id_tempati" name="id_tempati" placeholder="Pilih id siswa" readonly value="<?= $get_nilai['id_tempati'] ?>">
                                        <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                    </div>
                                </div>
                                <small class="text-danger"><?= form_error('id_tempati') ?></small>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('ekskul/data') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= form_close() ?>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Tambah modal -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table class="table table-hover" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_siswa as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nis_nasional'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['jenis_kelamin'] ?></td>
                                    <td>
                                        <button type="button" id="pilih" data-nis="<?= $data['id_tempati'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->

    <?php echo $this->load->view('template/footer'); ?>
    <script>
        $('.pilih').on('click', function() {
            var id_siswa = $(this).data('nis');
            var get_idguru = document.getElementById('id_tempati').value = id_siswa;
        });
    </script>