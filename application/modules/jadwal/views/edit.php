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
                                <li class="breadcrumb-item"><a href="<?= base_url('jadwal') ?>">Jadwal Pelajaran</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2"><?= $title; ?></h4>

                            <?= form_open() ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="<?= $get_jadwal['id'] ?>">
                                    <div class="form-group">
                                        <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                        <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021" value="<?= $get_jadwal['tahun_ajar'] ?>" required>
                                        <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Kelas <span class="text-danger">*</span></label>
                                        <select name="id_kelas" id="" class="form-control" data-toggle="select2" required>
                                            <option value="">-- Pilih kelas --</option>
                                            <?php foreach ($get_kelas as $kelas) : ?>
                                                <option value="<?= $kelas['id'] ?>" <?php if ($get_jadwal['id_kelas'] == $kelas['id']) : ?> selected <?php endif; ?>><?= $kelas['nm_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kelas') ?></small>
                                        <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Kelas</small></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Semester <span class="text-danger">*</span></label>
                                        <select name="semester" id="" class="form-control" required>
                                            <option value="1" <?php if ($get_jadwal['semester'] == "1") : ?> selected <?php endif; ?>>1</option>
                                            <option value="2" <?php if ($get_jadwal['semester'] == "1") : ?> selected <?php endif; ?>>2</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('semester') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pelajaran <span class="text-danger">*</span></label>
                                        <div class="form-input">
                                            <div class="input-group-prepend">
                                                <input type="hidden" id="id_ajar" name="id_ajar">
                                                <input type="text" class="form-control" id="pelajaran" name="pelajaran" value="<?= $get_guru_id['deskripsi'] ?> - <?= $get_guru_id['nama'] ?>" placeholder="Pilih id guru" readonly>
                                                <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                            </div>
                                        </div>
                                        <small class="text-danger"><?= form_error('id_ajar') ?></small>
                                    </div>
                                </div>
                            </div>

                            <p class="text-muted mb-2">Pilih Hari</p>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="inlineRadio1" <?php if ($get_jadwal['hari'] == "Senin") : ?> value="Senin" checked <?php else : ?> value="Senin" <?php endif; ?> name="hari">
                                <label for="inlineRadio1"> Senin </label>
                            </div>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="inlineRadio1" <?php if ($get_jadwal['hari'] == "Selasa") : ?> value="Selasa" checked <?php else : ?> value="Selasa" <?php endif; ?> name="hari">
                                <label for="inlineRadio1"> Selasa </label>
                            </div>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="inlineRadio1" <?php if ($get_jadwal['hari'] == "Rabu") : ?> value="Rabu" checked <?php else : ?> value="Rabu" <?php endif; ?> name="hari">
                                <label for="inlineRadio1"> Rabu </label>
                            </div>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="inlineRadio1" <?php if ($get_jadwal['hari'] == "Kamis") : ?> value="Kamis" checked <?php else : ?> value="Kamis" <?php endif; ?> name="hari">
                                <label for="inlineRadio1"> Kamis </label>
                            </div>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="inlineRadio1" <?php if ($get_jadwal['hari'] == "Jumat") : ?> value="Jumat" checked <?php else : ?> value="Jumat" <?php endif; ?> name="hari">
                                <label for="inlineRadio1"> Jumat </label>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jam Mulai</label>
                                        <input type="time" name="jam_mulai" class="form-control" value="<?= $get_jadwal['jam_mulai'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jam Selesai</label>
                                        <input type="time" name="jam_selesai" class="form-control" value="<?= $get_jadwal['jam_selesai'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Sessi Pelajaran</label>
                                <input type="number" name="sesi" class="form-control" value="<?= $get_jadwal['sesi'] ?>" required>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
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
                    <h4 class="modal-title">Tambah Guru Ajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table class="table table-hover" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Pelajaran</th>
                                <th>Pelajaran</th>
                                <th>KKM</th>
                                <th>Nama Guru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_guru as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['id_pelajaran'] ?></td>
                                    <td><?= $data['deskripsi'] ?></td>
                                    <td><?= $data['kkm'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td>
                                        <button type="button" id="pilih" data-idajar="<?= $data['id_ajar'] ?>" data-deskripsi="<?= $data['deskripsi'] ?>" data-nama="<?= $data['nama'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
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
            var deskripsi = $(this).data('deskripsi');
            var nama = $(this).data('nama');
            var idajar = $(this).data('idajar');
            var getguru = document.getElementById('id_ajar').value = idajar;
            var getguru = document.getElementById('pelajaran').value = deskripsi + " - " + nama;
        });
    </script>