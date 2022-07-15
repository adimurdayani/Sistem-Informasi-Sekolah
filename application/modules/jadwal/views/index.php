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
                                            <th class="text-center">#</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Sesi</th>
                                            <th class="text-center">Pelajaran</th>
                                            <th class="text-center">Guru</th>
                                            <th class="text-center">Hari & Waktu</th>
                                            <th class="text-center">Semester</th>
                                            <th class="text-center">Tahun Ajar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_jadwal as $data) :
                                            $ajar = $this->db->get_where('ajar', ['id_ajar' => $data['id_ajar']])->row_array();
                                            $guru = $this->db->get_where('guru', ['id_guru' => $ajar['id_guru']])->row_array();
                                            $pelajaran = $this->db->get_where('pelajaran', ['id_pelajaran' => $ajar['id_pelajaran']])->row_array();
                                            $kelas = $this->db->get_where('kelas', ['id' => $data['id_kelas']])->row_array();
                                        ?>
                                            <tr>
                                                <?php if ($session->id == 1) : ?>
                                                    <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data['id'] ?>"></td>
                                                    <td>
                                                        <a href="<?= base_url('jadwal/edit/') . $data['id'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                        <a href="<?= base_url('jadwal/hapus/') . $data['id'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $kelas['nm_kelas'] ?></td>
                                                <td class="text-center"><?= $data['sesi'] ?></td>
                                                <td><?= $pelajaran['deskripsi'] ?></td>
                                                <td><?= $guru['nama'] ?></td>
                                                <td>
                                                    <div data-target="#edit<?= $data['id'] ?>" data-toggle="modal" class="badge badge-outline-secondary">
                                                        <h6><?= $data['hari'] ?> : <?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?></h6>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?= $data['semester'] ?></td>
                                                <td class="text-center"><?= $data['tahun_ajar'] ?></td>
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

    <?php foreach ($get_jadwal as $edit) : ?>
        <!-- Tambah modal -->
        <div id="edit<?= $edit['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Hari dan Jam Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?= form_open('jadwal/edit_waktu') ?>
                    <div class="modal-body p-4 table-responsive">
                        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                        <p class="text-muted mb-2">Pilih Hari</p>
                        <div class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" <?php if ($edit['hari'] == "Senin") : ?> value="Senin" checked <?php else : ?> value="Senin" <?php endif; ?> name="hari">
                            <label for="inlineRadio1"> Senin </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" <?php if ($edit['hari'] == "Selasa") : ?> value="Selasa" checked <?php else : ?> value="Selasa" <?php endif; ?> name="hari">
                            <label for="inlineRadio1"> Selasa </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" <?php if ($edit['hari'] == "Rabu") : ?> value="Rabu" checked <?php else : ?> value="Rabu" <?php endif; ?> name="hari">
                            <label for="inlineRadio1"> Rabu </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" <?php if ($edit['hari'] == "Kamis") : ?> value="Kamis" checked <?php else : ?> value="Kamis" <?php endif; ?> name="hari">
                            <label for="inlineRadio1"> Kamis </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" <?php if ($edit['hari'] == "Jumat") : ?> value="Jumat" checked <?php else : ?> value="Jumat" <?php endif; ?> name="hari">
                            <label for="inlineRadio1"> Jumat </label>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam Mulai <span class="text-danger">*</span></label>
                                    <input type="time" name="jam_mulai" class="form-control" value="<?= $edit['jam_mulai'] ?>" placeholder="Input jam" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam Selesai <span class="text-danger">*</span></label>
                                    <input type="time" name="jam_selesai" class="form-control" placeholder="Input jam" value="<?= $edit['jam_selesai'] ?>" requried>
                                </div>
                            </div>
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