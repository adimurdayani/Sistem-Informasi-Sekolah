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
                            <form action="<?= base_url('jadwal/hapus_all/') ?>" method="POST" id="form-delete">
                                <?php if ($session->id == 1) : ?>
                                    <a href="<?= base_url('jadwal/tambah') ?>" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
                                    <button type="submit" class="btn btn-danger mb-3" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                <?php endif; ?>

                                <h4 class="header-title mb-2">Data <?= $title; ?></h4>
                                <table class="table table-hover" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <?php if ($session->id == 1) : ?>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th>Action</th>
                                            <?php endif ?>
                                            <th>#</th>
                                            <th>Kelas</th>
                                            <th>Pelajaran</th>
                                            <th>Guru</th>
                                            <th>Hari & Waktu</th>
                                            <th>Semester</th>
                                            <th>Tahun Ajar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_jadwal as $data) :
                                            $ajar = $this->db->get_where('ajar', ['id_ajar' => $data['id_ajar']])->row_array();
                                            $guru = $this->db->get_where('guru', ['id_guru' => $ajar['id_guru']])->row_array();
                                            $pelajaran = $this->db->get_where('pelajaran', ['id_pelajaran' => $ajar['id_pelajaran']])->row_array();
                                            $detail = $this->db->get_where('detail_jadwal', ['id_jadwal' => $data['id_jadwal']])->result_array();
                                            $jml = $this->db->get('detail_jadwal')->num_rows();
                                        ?>
                                            <tr>
                                                <?php if ($session->id == 1) : ?>
                                                    <td><input type="checkbox" class="check-item" name="id_jadwal[]" value="<?= $data['id_jadwal'] ?>"></td>
                                                    <td>
                                                        <a href="<?= base_url('jadwal/edit/') . $data['id'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                        <a href="<?= base_url('jadwal/hapus/') . $data['id'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['id_kelas'] ?></td>
                                                <td><?= $pelajaran['deskripsi'] ?></td>
                                                <td><?= $guru['nama'] ?></td>
                                                <td>
                                                    <?php foreach ($detail as $d) : ?>
                                                        <a href="" data-target="#edit-detail<?= $d['id_detail'] ?>" data-toggle="modal" class="badge badge-outline-secondary">
                                                            <h6><?= $d['hari'] ?> - <?= $d['jam'] ?></h6>
                                                        </a>
                                                    <?php endforeach; ?>
                                                    <?php if ($session->id == 1) : ?>
                                                        <a href="" data-target="#tambah<?= $data['id_jadwal'] ?>" data-toggle="modal" class="btn btn-info"><i class="fe-plus"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $data['semester'] ?></td>
                                                <td><?= $data['tahun_ajar'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <?php foreach ($get_jadwal as $tambah) : ?>
        <!-- Tambah modal -->
        <div id="tambah<?= $tambah['id_jadwal'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Hari dan Jam Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?= form_open('jadwal/tambah_detail_id') ?>
                    <div class="modal-body p-4 table-responsive">
                        <input type="hidden" name="id_jadwal" value="<?= $tambah['id_jadwal'] ?>">
                        <div class="form-group">
                            <label for="">Hari <span class="text-danger">*</span></label>
                            <input type="text" name="hari" class="form-control" placeholder="Input hari">
                        </div>

                        <div class="form-group">
                            <label for="">Jam <span class="text-danger">*</span></label>
                            <input type="time" name="jam" class="form-control" placeholder="Input jam">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i> Tutup</button>
                        <?php if ($session->id == 1) : ?>
                            <button type="submit" class="btn btn-outline-warning waves-effect"><i class="fe-save"></i> Update</button>
                        <?php endif; ?>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>

    <!-- Tambah modal -->
    <?php if (!empty($jml)) : ?>
        <?php foreach ($detail as $edit) : ?>
            <div id="edit-detail<?= $edit['id_detail'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Hari dan Jam Pelajaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <?= form_open('jadwal/edit_detail') ?>
                        <div class="modal-body p-4 table-responsive">
                            <input type="hidden" name="id_jadwal" value="<?= $edit['id_jadwal'] ?>">
                            <div class="form-group">
                                <label for="">Hari <span class="text-danger">*</span></label>
                                <input type="text" name="hari" class="form-control" placeholder="2020-2021" value="<?= $edit['hari'] ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Jam <span class="text-danger">*</span></label>
                                <input type="text" name="jam" class="form-control" placeholder="2020-2021" value="<?= $edit['jam'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i> Tutup</button>
                            <?php if ($session->id == 1) : ?>
                                <button type="submit" class="btn btn-outline-warning waves-effect"><i class="fe-save"></i> Update</button>
                            <?php endif; ?>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div><!-- /.modal -->
        <?php endforeach; ?>
    <?php endif; ?>