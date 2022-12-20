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
                                <li class="breadcrumb-item"><a href="<?= base_url('kelas/kelas_siswa') ?>">Kelas Siswa</a></li>
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

                            <?= validation_errors() ?>

                            <?= form_open('kelas/kelas_siswa/tambah') ?>
                            <div class="form-group">
                                <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021">
                                <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kelas <span class="text-danger">*</span></label>
                                        <select name="id_kelas" id="" class="form-control">
                                            <option value="">-- Pilih kelas --</option>
                                            <?php foreach ($get_kelas as $kelas) : ?>
                                                <option value="<?= $kelas['id'] ?>"><?= $kelas['nm_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kelas') ?></small>
                                        <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Kelas</small></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Kelas <span class="text-danger">*</span></label>
                                        <select name="id_jurusan" id="" class="form-control" data-toggle="select2">
                                            <option value="">-- Pilih nama kelas --</option>
                                            <?php foreach ($get_jurusan as $detail) : ?>
                                                <option value="<?= $detail['id'] ?>"><?= $detail['nama_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_jurusan') ?></small>
                                        <a href="<?= base_url('kelas/kelas_detail') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Nama Kelas</small></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Siswa <span class="text-danger">*</span></label>
                                <div class="form-input">
                                    <div class="input-group-prepend">
                                        <input type="text" class="form-control" id="nis" name="nisn" placeholder="Input tempat lahir" readonly>
                                        <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('kelas/kelas_siswa') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
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
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_siswa as $data) : ?>
                                <?php if ($data['id_user'] == 3) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nis'] ?></td>
                                        <td><?= $data['nis_nasional'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td>
                                            <button type="button" id="pilih" data-nis="<?= $data['nis_nasional'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
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
            var nis = $(this).data('nis');
            var get_nis = document.getElementById('nis').value = nis;
        });
    </script>