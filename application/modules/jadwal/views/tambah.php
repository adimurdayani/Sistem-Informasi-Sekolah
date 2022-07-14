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
                                <li class="breadcrumb-item"><a href="<?= base_url('jadwal') ?>">Jadwal Pelajaran</a></li>
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

                            <?= form_open('jadwal/tambah') ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tahun Ajar <span class="text-danger">*</span></label>
                                        <input type="text" name="tahun_ajar" class="form-control" placeholder="2020-2021">
                                        <small class="text-danger"><?= form_error('tahun_ajar') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Kelas <span class="text-danger">*</span></label>
                                        <select name="id_kelas" id="" class="form-control" data-toggle="select2">
                                            <option value="">-- Pilih kelas --</option>
                                            <?php foreach ($get_kelas as $kelas) : ?>
                                                <option value="<?= $kelas['id'] ?>"><?= $kelas['nm_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kelas') ?></small>
                                        <a href="<?= base_url('kelas') ?>"><small class="text-info"><i class="fe-plus"></i> Tambah Kelas</small></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Semester <span class="text-danger">*</span></label>
                                        <select name="semester" id="" class="form-control">
                                            <option value="">-- Pilih semester --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <small class="text-danger"><?= form_error('semester') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pelajaran <span class="text-danger">*</span></label>
                                        <div class="form-input">
                                            <div class="input-group-prepend">
                                                <input type="hidden" id="id_ajar" name="id_ajar">
                                                <input type="text" class="form-control" id="pelajaran" name="pelajaran" placeholder="Pilih id guru" readonly>
                                                <span class="input-group-text" id="basic-addon1" data-target="#tambah" data-toggle="modal"><i class="fe-search"></i></span>
                                            </div>
                                        </div>
                                        <small class="text-danger"><?= form_error('id_ajar') ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Hari & Waktu</label>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="senin" value="Senin" data-hari="Senin" class="hari1" name="hari[]"> Senin</th>
                                            <th><input type="checkbox" id="selasa" value="Selasa" data-hari="Selasa" class="hari2" name="hari[]"> Selasa</th>
                                            <th><input type="checkbox" id="rabu" value="Rabu" data-hari="Rabu" class="hari3" name="hari[]"> Rabu</th>
                                            <th><input type="checkbox" id="kamis" value="Kamis" data-hari="Kamis" class="hari4" name="hari[]"> Kamis</th>
                                            <th><input type="checkbox" id="jumat" value="Jumat" data-hari="Jumat" class="hari5" name="hari[]"> Jumat</th>
                                            <th><input type="checkbox" id="saptu" value="Saptu" data-hari="Saptu" class="hari6" name="hari[]"> Saptu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="jam[]" id="jam1" class="form-control jam1" disabled required>
                                            </td>
                                            <td>
                                                <input type="text" name="jam[]" id="jam2" class="form-control jam2" disabled>
                                            </td>
                                            <td>
                                                <input type="text" name="jam[]" id="jam3" class="form-control jam3" disabled>
                                            </td>
                                            <td>
                                                <input type="text" name="jam[]" id="jam4" class="form-control jam4" disabled>
                                            </td>
                                            <td>
                                                <input type="text" name="jam[]" id="jam5" class="form-control jam5" disabled>
                                            </td>
                                            <td>
                                                <input type="text" name="jam[]" id="jam6" class="form-control jam6" disabled>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-success float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary float-right mt-4 mr-3"><i class="fe-arrow-left"></i> Kembali</a>
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
                                <th>ID Pelajaran</th>
                                <th>Pelajaran</th>
                                <th>KKM</th>
                                <th>Nama Guru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_guru as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['id_pelajaran'] ?></td>
                                    <td><?= $data['deskripsi'] ?></td>
                                    <td><?= $data['kkm'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td>
                                        <button type="button" id="pilih" data-idajar="<?= $data['id_ajar'] ?>" data-deskripsi="<?= $data['deskripsi'] ?>" data-nama="<?= $data['nama'] ?>" data-dismiss="modal" class="badge badge-success pilih"><i class="fe-plus"></i> Pilih</button>
                                    </td>
                                </tr>
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
            var deskripsi = $(this).data('deskripsi');
            var nama = $(this).data('nama');
            var idajar = $(this).data('idajar');
            var getguru = document.getElementById('id_ajar').value = idajar;
            var getguru = document.getElementById('pelajaran').value = deskripsi + " - " + nama;
        });

        $("#senin").click(function() {
            if ($('#senin').is(':checked'))
                $('#jam1').attr("disabled", false);
            else
                $('#jam1').attr("disabled", true);
        });

        $("#selasa").click(function() {
            if ($('#selasa').is(':checked'))
                $('#jam2').attr("disabled", false);
            else
                $('#jam2').attr("disabled", true);
        });

        $("#rabu").click(function() {
            if ($('#rabu').is(':checked'))
                $('#jam3').attr("disabled", false);
            else
                $('#jam3').attr("disabled", true);
        });

        $("#kamis").click(function() {
            if ($('#kamis').is(':checked'))
                $('#jam4').attr("disabled", false);
            else
                $('#jam4').attr("disabled", true);
        });

        $("#jumat").click(function() {
            if ($('#jumat').is(':checked'))
                $('#jam5').attr("disabled", false);
            else
                $('#jam5').attr("disabled", true);
        });

        $("#saptu").click(function() {
            if ($('#saptu').is(':checked'))
                $('#jam6').attr("disabled", false);
            else
                $('#jam6').attr("disabled", true);
        });

        if ($('#senin').is(':checked'))
            $('#jam1').attr("disabled", false);
        else
            $('#jam1').attr("disabled", true);

        if ($('#selasa').is(':checked'))
            $('#jam2').attr("disabled", false);
        else
            $('#jam2').attr("disabled", true);

        if ($('#rabu').is(':checked'))
            $('#jam3').attr("disabled", false);
        else
            $('#jam3').attr("disabled", true);

        if ($('#kamis').is(':checked'))
            $('#jam4').attr("disabled", false);
        else
            $('#jam4').attr("disabled", true);

        if ($('#jumat').is(':checked'))
            $('#jam5').attr("disabled", false);
        else
            $('#jam5').attr("disabled", true);

        if ($('#saptu').is(':checked'))
            $('#jam6').attr("disabled", false);
        else
            $('#jam6').attr("disabled", true);
    </script>