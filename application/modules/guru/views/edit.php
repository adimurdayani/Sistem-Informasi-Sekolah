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
                                <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Guru</a></li>
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
                                    <input type="hidden" name="id_guru" value="<?= $get_guru['id_guru'] ?>">
                                    <div class="form-group">
                                        <label for="">NIP <span class="text-danger">*</span></label>
                                        <input type="number" name="nip" class="form-control" placeholder="Input NIP" value="<?= $get_guru['nip'] ?>">
                                        <small class="text-danger"><?= form_error('nip') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Input nama" value="<?= $get_guru['nama'] ?>">
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option value="">-- Pilih jenis kelamin --</option>
                                            <option value="Perempuan" <?php if ($get_guru['jenis_kelamin'] == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
                                            <option value="Laki-Laki" <?php if ($get_guru['jenis_kelamin'] == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Input tempat lahir" value="<?= $get_guru['tempat_lahir'] ?>">
                                                <small class="text-danger"><?= form_error('tempat_lahir') ?></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Input tanggal lahir" value="<?= $get_guru['tgl_lahir'] ?>">
                                                <small class="text-danger"><?= form_error('tgl_lahir') ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Agama <span class="text-danger">*</span></label>
                                        <select name="agama" id="" class="form-control">
                                            <option value="">-- Pilih agama --</option>
                                            <option value="Kristen" <?php if ($get_guru['agama'] == "Kristen") : ?> selected <?php endif; ?>>Kristen</option>
                                            <option value="Hindu" <?php if ($get_guru['agama'] == "Hindu") : ?> selected <?php endif; ?>>Hindu</option>
                                            <option value="Islam" <?php if ($get_guru['agama'] == "Islam") : ?> selected <?php endif; ?>>Islam</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" class="form-control" rows="5"><?= $get_guru['alamat'] ?></textarea>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Golongan <span class="text-danger">*</span></label>
                                        <input type="text" name="golongan" class="form-control" placeholder="Input golongan" value="<?= $get_guru['golongan'] ?>">
                                        <small class="text-danger"><?= form_error('golongan') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jabatan <span class="text-danger">*</span></label>
                                        <input type="text" name="jabatan" class="form-control" placeholder="Input jabatan" value="<?= $get_guru['jabatan'] ?>">
                                        <small class="text-danger"><?= form_error('jabatan') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                        <select name="pendidikan_terakhir" id="" class="form-control">
                                            <option value="">-- Pilih pendidikan terakhir --</option>
                                            <option value="S3" <?php if ($get_guru['pendidikan_terakhir'] == "S3") : ?> selected <?php endif; ?>>S3</option>
                                            <option value="S2" <?php if ($get_guru['pendidikan_terakhir'] == "S2") : ?> selected <?php endif; ?>>S2</option>
                                            <option value="S1" <?php if ($get_guru['pendidikan_terakhir'] == "S1") : ?> selected <?php endif; ?>>S1</option>
                                            <option value="SMA" <?php if ($get_guru['pendidikan_terakhir'] == "SMA") : ?> selected <?php endif; ?>>SMA</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('pendidikan_terakhir') ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Input email" value="<?= $get_guru['email'] ?>">
                                                <small class="text-danger"><?= form_error('email') ?></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone <span class="text-danger">*</span></label>
                                                <input type="number" name="telpon" class="form-control" placeholder="Input phone" value="<?= $get_guru['telpon'] ?>">
                                                <small class="text-danger"><?= form_error('telpon') ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Masuk <span class="text-danger">*</span></label>
                                                <input type="date" name="tgl_masuk" class="form-control" placeholder="Input tanggal masuk" value="<?= $get_guru['tgl_masuk'] ?>">
                                                <small class="text-danger"><?= form_error('tgl_masuk') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Kategori user <span class="text-danger">*</span></label>
                                                <select name="id_user" id="id_user" class="form-control">
                                                    <option value="">-- Pilih kategori user --</option>
                                                    <?php foreach ($get_group as $grup) : ?>
                                                        <option value="<?= $grup['id'] ?>" <?php if ($get_guru['id_user'] == $grup['id']) : ?> selected <?php endif; ?>><?= $grup['description'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small class="text-danger"><?= form_error('id_user') ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('guru') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= form_close() ?>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->