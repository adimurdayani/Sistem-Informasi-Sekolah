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
                                <li class="breadcrumb-item"><a href="<?= base_url('ajar') ?>">Ajar (Guru Bidang Studi)</a></li>
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
                            <input type="hidden" name="id" class="form-control" placeholder="2020-2021" value="<?= $get_walikelas['id'] ?>">
                            <div class="form-group">
                                <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021" value="<?= $get_walikelas['tahun_ajar'] ?>">
                                <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Kelas <span class="text-danger">*</span></label>
                                <select name="id_kelas" id="" class="form-control">
                                    <option value="">-- Pilih kelas --</option>
                                    <?php foreach ($get_kelas as $kelas) : ?>
                                        <option value="<?= $kelas['id_kelas'] ?>" <?php if ($get_walikelas['id_kelas'] == $kelas['id_kelas']) : ?> selected <?php endif; ?>><?= $kelas['nm_kelas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_kelas') ?></small>
                                <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Pelajaran</small></a>
                            </div>

                            <div class="form-group">
                                <label for="">Guru <span class="text-danger">*</span></label>
                                <div class="form-input">
                                    <div class="input-group-prepend">
                                        <input type="text" class="form-control" id="id_guru" name="id_guru" placeholder="Pilih id guru" readonly value="<?= $get_walikelas['id_guru'] ?>">
                                        <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('walikelas') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_guru as $data) : ?>
                                <?php if ($data['id_user'] == 2) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nip'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['tempat_lahir'] ?></td>
                                        <td><?= $data['tgl_lahir'] ?></td>
                                        <td><?= $data['agama'] ?></td>
                                        <td><?= $data['golongan'] ?></td>
                                        <td><?= $data['jabatan'] ?></td>
                                        <td><?= $data['pendidikan_terakhir'] ?></td>
                                        <td>
                                            <button type="button" id="pilih" data-idguru="<?= $data['id_guru'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
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
            var id_guru = $(this).data('idguru');
            var get_idguru = document.getElementById('id_guru').value = id_guru;
        });
    </script>