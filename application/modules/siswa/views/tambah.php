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
                                <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">siswa</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?= form_open('siswa/tambah') ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">


                            <h4 class="header-title mb-2">Data Siswa</h4>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NIS <span class="text-danger">*</span></label>
                                                <input type="text" name="nis" class="form-control" placeholder="Input nis">
                                                <small class="text-danger"><?= form_error('nis') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NISN <span class="text-danger">*</span></label>
                                                <input type="text" name="nis_nasional" class="form-control" placeholder="Input nis_nasional">
                                                <small class="text-danger"><?= form_error('nis_nasional') ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Input nama">
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" id="" class="form-control" required>
                                            <option value="">-- Pilih jenis kelamin --</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Input tempat lahir">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Input tanggal lahir">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <select name="agama" id="" class="form-control">
                                            <option value="">-- Pilih agama --</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Islam">Islam</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="5"></textarea>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Anak Ke</label>
                                        <input type="number" name="anak_ke" class="form-control" placeholder="Input anak ke">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tahun Masuk</label>
                                                <input type="number" name="tahun_masuk" class="form-control" placeholder="Input tahun masuk">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tahun Keluar</label>
                                                <input type="number" name="tahun_keluar" class="form-control" placeholder="Input tahun keluar">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email Orang Tua</label>
                                        <input type="email" name="email_ortu" class="form-control" placeholder="Input email">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alasan keluar</label>
                                        <textarea name="alasan_keluar" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori user</label>
                                        <select name="id_user" id="id_user" class="form-control">
                                            <option value="">-- Pilih kategori user --</option>
                                            <?php foreach ($get_group as $grup) : ?>
                                                <option value="<?= $grup['id'] ?>"><?= $grup['description'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">Data Orang Tua</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-center">Bapak</h4>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="text-center">Ibu</h4>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Bapak</label>
                                        <input type="text" name="nama_bapak" class="form-control" placeholder="Input nama">
                                        <small class="text-danger"><?= form_error('nama_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pekerjaan Bapak</label>
                                        <input type="text" name="pekerjaan_bapak" class="form-control" placeholder="Input pekerjaan">
                                        <small class="text-danger"><?= form_error('pekerjaan_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pendidikan Bapak</label>
                                        <select name="pendidikan_bapak" id="" class="form-control">
                                            <option value="">-- Pilih pendidikan --</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat Bapak</label>
                                        <textarea name="alamat_bapak" class="form-control" rows="5"></textarea>
                                        <small class="text-danger"><?= form_error('alamat_bapak') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Telepon Bapak</label>
                                        <input type="number" name="telp_bapak" class="form-control" placeholder="Input nomor telepon">
                                        <small class="text-danger"><?= form_error('telp_bapak') ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Nama ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" placeholder="Input nama">
                                        <small class="text-danger"><?= form_error('nama_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pekerjaan ibu</label>
                                        <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Input pekerjaan">
                                        <small class="text-danger"><?= form_error('pekerjaan_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pendidikan ibu</label>
                                        <select name="pendidikan_ibu" id="" class="form-control">
                                            <option value="">-- Pilih pendidikan --</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('agama') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat ibu</label>
                                        <textarea name="alamat_ibu" class="form-control" rows="5"></textarea>
                                        <small class="text-danger"><?= form_error('alamat_ibu') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Telepon ibu</label>
                                        <input type="number" name="telp_ibu" class="form-control" placeholder="Input nomor telepon">
                                        <small class="text-danger"><?= form_error('telp_ibu') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">Data Wali</h4>

                            <div class="form-group">
                                <label for="">Nama wali</label>
                                <input type="text" name="nama_wali" class="form-control" placeholder="Input nama">
                                <small class="text-danger"><?= form_error('nama_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Alamat wali</label>
                                <textarea name="alamat_wali" class="form-control" rows="5"></textarea>
                                <small class="text-danger"><?= form_error('alamat_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Telepon wali</label>
                                <input type="number" name="telp_wali" class="form-control" placeholder="Input nomor telepon">
                                <small class="text-danger"><?= form_error('telp_wali') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="">Hubungan wali</label>
                                <input type="text" name="hubungan_wali" class="form-control" placeholder="Input hubungan wali">
                                <small class="text-danger"><?= form_error('hubungan_wali') ?></small>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->
            <button type="submit" class="btn btn-success float-right mb-4"><i class="fe-save"></i> Simpan</button>
            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary float-right mb-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
            <?= form_close() ?>

        </div> <!-- container -->

    </div> <!-- content -->