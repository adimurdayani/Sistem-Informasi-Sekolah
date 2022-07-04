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

                            <ul class="nav nav-tabs nav-bordered nav-justified">
                                <li class="nav-item">
                                    <a href="<?= base_url('kelas/kelas_siswa') ?>" class="nav-link">
                                        Kelas X
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('kelas/kelas_siswa/kelas_xi') ?>" class="nav-link">
                                        Kelas XI
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kelas-xii" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        Kelas XII
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="kelas-xii">

                                    <form action="<?= base_url('kelas/kelas_siswa/hapus_all/') ?>" method="POST" id="form-delete">
                                        <?php if ($session->id == 1) : ?>
                                            <a href="<?= base_url('kelas/kelas_siswa/tambah') ?>" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
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
                                                    <th class="text-center">Tahun Ajar</th>
                                                    <th class="text-center">NIS</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Jenis Kelamin</th>
                                                    <th class="text-center">Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($get_siswa as $data) : ?>
                                                    <?php if ($data['id_kelas'] == 3) : ?>
                                                        <tr>
                                                            <?php if ($session->id == 1) : ?>
                                                                <td><input type="checkbox" class="check-item" name="id_tempati[]" value="<?= $data['id_tempati'] ?>"></td>
                                                                <td>
                                                                    <a href="<?= base_url('kelas/kelas_siswa/edit/') . $data['id_tempati'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                                    <a href="<?= base_url('kelas/kelas_siswa/hapus/') . $data['id_tempati'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                                </td>
                                                            <?php endif; ?>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td class="text-center"><?= $data['tahun_ajar'] ?></td>
                                                            <td class="text-center"><?= $data['nis'] ?></td>
                                                            <td><?= $data['nama'] ?></td>
                                                            <td><?= $data['jenis_kelamin'] ?></td>
                                                            <td class="text-center">
                                                                <div class="badge badge-outline-info">
                                                                    <h5><?= $data['nama_kelas'] ?></h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->