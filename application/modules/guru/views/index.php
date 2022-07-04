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
                            <form action="<?= base_url('guru/hapus_all/') ?>" method="POST" id="form-delete">
                                <?php if ($session->id == 1) : ?>
                                    <a href="<?= base_url('guru/tambah') ?>" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
                                    <button type="submit" class="btn btn-danger mb-3" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                <?php endif; ?>

                                <h4 class="header-title mb-2">Data <?= $title; ?></h4>
                                <table class="table table-hover" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <?php if ($session->id == 1) : ?>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th class="text-center">Action</th>
                                            <?php endif; ?>
                                            <th class="text-center">#</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Golongan</th>
                                            <th class="text-center">Pendidikan Terkahir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_guru as $data) : ?>
                                            <tr>
                                                <?php if ($session->id == 1) : ?>
                                                    <td><input type="checkbox" class="check-item" name="id_guru[]" value="<?= $data['id_guru'] ?>"></td>
                                                    <td>
                                                        <a href="<?= base_url('guru/edit/') . $data['id_guru'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                        <a href="<?= base_url('guru/hapus/') . $data['id_guru'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="text-center"><?= $data['nip'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td class="text-center"><?= $data['jenis_kelamin'] ?></td>
                                                <td><?= $data['jabatan'] ?></td>
                                                <td class="text-center"><?= $data['golongan'] ?></td>
                                                <td class="text-center"><?= $data['pendidikan_terakhir'] ?></td>
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