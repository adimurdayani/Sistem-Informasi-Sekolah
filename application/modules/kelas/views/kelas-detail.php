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
                            <form action="<?= base_url('kelas/kelas_detail/hapus_all/') ?>" method="POST" id="form-delete">
                                <?php if ($session->id == 1) : ?>
                                    <a href="<?= base_url('kelas/kelas_siswa/tambah') ?>" class="btn btn-secondary mb-3"><i class="fe-arrow-left"></i> Kembali</a>
                                    <a href="" data-target="#tambah" data-toggle="modal" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
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
                                            <th>Nama Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_jurusan as $data) : ?>
                                            <tr>
                                                <?php if ($session->id == 1) : ?>
                                                    <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data['id'] ?>"></td>
                                                    <td>
                                                        <a href="#" data-target="#edit<?= $data['id'] ?>" data-toggle="modal" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                        <a href="<?= base_url('kelas/kelas_detail/hapus/') . $data['id'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama_kelas'] ?></td>
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

    <!-- Tambah modal -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah nama kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <?php echo form_open("kelas/kelas_detail/tambah"); ?>
                <div class="modal-body p-4">

                    <div class="form-group mb-3">
                        <label for="company">Kelas <span class="text-danger">*</span></label>
                        <select name="id_kelas" id="id_kelas" class="form-control" required>
                            <option value="">-- Pilih kelas --</option>
                            <?php foreach ($get_id_kelas as $idkelas) : ?>
                                <option value="<?= $idkelas['id'] ?>"><?= $idkelas['nm_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama_kelas">Nama Kelas <span class="text-danger">*</span></label>
                        <input type="text" id="nama_kelas" name="nama_kelas" value="<?= set_value('nama_kelas') ?>" placeholder="Input nama kelas" class="form-control" required>
                        <?= form_error('nama_kelas', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- edit modal -->
    <?php foreach ($get_jurusan as $edit) : ?>
        <div id="edit<?= $edit['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit nama kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?php echo form_open("kelas/kelas_detail/edit"); ?>
                    <div class="modal-body p-4">

                        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                        <div class="form-group mb-3">
                            <label for="company">Kelas <span class="text-danger">*</span></label>
                            <select name="id_kelas" id="id_kelas" class="form-control" required>
                                <option value="">-- Pilih kelas --</option>
                                <?php foreach ($get_id_kelas as $idkelas) : ?>
                                    <option value="<?= $idkelas['id'] ?>" <?php if ($idkelas['id'] == $edit['id_kelas']) : ?> selected <?php endif ?>><?= $idkelas['nm_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_kelas">Nama Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Input nama kelas" value="<?= $edit['nama_kelas'] ?>" class="form-control" required>
                            <?= form_error('nama_kelas', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach ?>