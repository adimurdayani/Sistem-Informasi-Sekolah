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
                                <li class="breadcrumb-item"><a href="<?= base_url('nilai') ?>">Nilai Semester Ganjil</a></li>
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
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $get_nilai['id'] ?>">
                                <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021" value="<?= $get_nilai['tahun_ajar'] ?>">
                                <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pelajaran <span class="text-danger">*</span></label>
                                        <select name="id_pelajaran" id="" class="form-control">
                                            <option value="">-- Pilih pelajaran --</option>
                                            <?php foreach ($get_pelajaran as $pelajaran) : ?>
                                                <option value="<?= $pelajaran['id'] ?>" <?php if ($get_nilai['id_pelajaran'] == $pelajaran['id']) : ?> selected <?php endif; ?>><?= $pelajaran['deskripsi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_pelajaran') ?></small>
                                        <a href="<?= base_url('ajar/pelajaran') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Pelajaran</small></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kelas <span class="text-danger">*</span></label>
                                        <select name="id_kelas" id="" class="form-control">
                                            <option value="">-- Pilih kelas --</option>
                                            <?php foreach ($get_kelas as $kelas) : ?>
                                                <option value="<?= $kelas['id'] ?>" <?php if ($get_nilai['id_kelas'] == $kelas['id']) : ?> selected <?php endif; ?>><?= $kelas['nm_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kelas') ?></small>
                                        <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Kelas</small></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Semester <span class="text-danger">*</span></label>
                                <select name="semester" id="" class="form-control">
                                    <option value="">-- Pilih semester --</option>
                                    <option value="1" <?php if ($get_nilai['semester'] == "1") : ?> selected <?php endif; ?>>1</option>
                                    <option value="2" <?php if ($get_nilai['semester'] == "2") : ?> selected <?php endif; ?>>2</option>
                                </select>
                                <small class="text-danger"><?= form_error('semester') ?></small>
                                <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Kelas</small></a>
                            </div>

                            <div class="form-group">
                                <label for="">Siswa <span class="text-danger">*</span></label>
                                <div class="form-input">
                                    <div class="input-group-prepend">
                                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" placeholder="Pilih id siswa" readonly>
                                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Pilih id siswa" readonly value="<?= $get_nilai['nis_nasional'] ?> - <?= $get_nilai['nama'] ?>">
                                        <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                    </div>
                                </div>
                                <small class="text-danger"><?= form_error('id_siswa') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Nilai <span class="text-danger">*</span></label>
                                <input type="number" name="nilai" class="form-control" placeholder="input nilai" value="<?= $get_nilai['nilai'] ?>">
                                <small class="text-danger"><?= form_error('nilai') ?></small>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('nilai') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
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
                                <th>Agama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_siswa as $data) : ?>
                                <?php if ($data['id_user'] == 3) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nis_nasional'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['agama'] ?></td>
                                        <td>
                                            <button type="button" id="pilih" data-idsiswa="<?= $data['id_siswa'] ?>" data-nis="<?= $data['nis_nasional'] ?>" data-nama="<?= $data['nama'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
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
            var id_siswa = $(this).data('idsiswa');
            var nis = $(this).data('nis');
            var nama = $(this).data('nama');
            var getsiswa = document.getElementById('id_siswa').value = id_siswa;
            var getsiswa = document.getElementById('nis').value = nis + ' - ' + nama;
        });
    </script>