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
                            <form action="<?= base_url('ekskul/data/hapus_all/') ?>" method="POST" id="form-delete">
                                <?php if ($session->id == 1 || $session->id == 2) : ?>
                                    <a href="<?= base_url('ekskul/data/tambah') ?>" class="btn btn-primary mb-3"><i class="fe-plus"></i> Tambah</a>
                                    <button type="submit" class="btn btn-danger mb-3" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                <?php endif; ?>

                                <h4 class="header-title mb-2">Data <?= $title; ?></h4>
                                <table class="table table-hover" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <?php if ($session->id == 1 || $session->id == 2) : ?>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th>Action</th>
                                            <?php endif ?>
                                            <th>#</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Ekskul</th>
                                            <th>Tahun Ajar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_ekskul as $data) :
                                            $ekskul = $this->db->get_where('ekskul', ['id_ekskul' => $data['id_ekskul']])->row_array();
                                            $tempati = $this->db->get_where('tempati', ['id_tempati' => $data['id_tempati']])->row_array();
                                            $siswa = $this->db->get_where('siswa', ['nis_nasional' => $tempati['nis']])->row_array();
                                        ?>
                                            <tr>
                                                <?php if ($session->id == 1 || $session->id == 2) : ?>
                                                    <td><input type="checkbox" class="check-item" name="id_nilaiekskul[]" value="<?= $data['id_nilaiekskul'] ?>"></td>
                                                    <td>
                                                        <a href="<?= base_url('ekskul/data/edit/') . $data['id_nilaiekskul'] ?>" class="badge badge-warning"><i class="fe-edit"></i> Edit</a>
                                                        <a href="<?= base_url('ekskul/data/hapus/') . $data['id_nilaiekskul'] ?>" class="badge badge-danger hapus"><i class="fe-trash"></i> Hapus</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $siswa['nis_nasional'] ?></td>
                                                <td><?= $siswa['nama'] ?></td>
                                                <td><?= $siswa['jenis_kelamin'] ?></td>
                                                <td><?= $data['nm_ekskul'] ?></td>
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