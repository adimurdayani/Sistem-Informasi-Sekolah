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
                            <form action="<?= base_url('nilai/hapus_all/') ?>" method="POST" id="form-delete">
                                <?php $group = $this->db->get_where('users_groups', ['group_id' => $session->id])->row();
                                if ($group->group_id == 1 || $group->group_id == 2) : ?>
                                    <a href="<?= base_url('nilai/tambah') ?>" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
                                    <button type="submit" class="btn btn-danger mb-3" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                <?php endif; ?>

                                <h4 class="header-title mb-2">Data <?= $title; ?></h4>
                                <table class="table table-hover" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <?php if ($group->group_id == 1 || $group->group_id == 2) : ?>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th>Action</th>
                                            <?php endif ?>
                                            <th>#</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>MK</th>
                                            <th>Nilai</th>
                                            <th>Tahun Ajar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_nilai as $data) : ?>
                                            <?php if ($data['semester'] != 1) : ?>
                                                <tr>
                                                    <?php if ($group->group_id == 1 || $group->group_id == 2) : ?>
                                                        <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data['id'] ?>"></td>
                                                        <td>
                                                            <a href="<?= base_url('nilai/edit/') . $data['id'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                            <a href="<?= base_url('nilai/hapus/') . $data['id'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['nis_nasional'] ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['jenis_kelamin'] ?></td>
                                                    <td><?= $data['nm_kelas'] ?></td>
                                                    <td><?= $data['semester'] ?></td>
                                                    <td><?= $data['deskripsi'] ?></td>
                                                    <td><?= $data['nilai'] ?></td>
                                                    <td><?= $data['tahun_ajar'] ?></td>
                                                </tr>
                                            <?php endif; ?>
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