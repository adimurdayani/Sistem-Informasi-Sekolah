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
                            <button onclick="history.back()" class="btn btn-secondary mb-2"><i class="fe-arrow-left"></i> Kembali</button>
                            <h4 class="header-title">Data <?= $title; ?></h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Kapasitas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <?php $this->load->view('template/footer'); ?>

    <script language="JavaScript" type="text/javascript">
        var $ = jQuery;
        jQuery(document).ready(function() {
            //load data
            function load_data() {
                $.ajax({
                    url: "<?= base_url(); ?>ajar/pelajaran/load_data",
                    dataType: "JSON",
                    success: function(data) {
                        //colom inputan
                        var html = '<tr>';
                        html += '<td id="id_pelajaran" contenteditable placeholder="id kelas"></td>';
                        html += '<td id="deskripsi" contenteditable placeholder="deskripsi"></td>';
                        html += '<td id="kkm" contenteditable placeholder="kkm"></td>';
                        html += '<td><button type="button" name="btn_add" id="btn_add" title="Tambah kelas" data-plugin="tippy" data-tippy-placement="top" class="btn btn-outline-info"><span class="fa fa-plus"></span> </td></tr>';
                        //looping data dalam bentuk json
                        for (var count = 0; count < data.length; count++) {
                            var id = data[count].id;
                            html += '<tr>';
                            html += '<td class="table_data" data-row_id="' + data[count].id +
                                '" data-column_name="id_pelajaran" contenteditable>' + data[count].id_pelajaran +
                                '</td>';
                            html += '<td class="table_data" data-row_id="' + data[count].id +
                                '" data-column_name="deskripsi" contenteditable>' + data[count].deskripsi +
                                '</td>';
                            html += '<td class="table_data" data-row_id="' + data[count].id +
                                '" data-column_name="kkm" contenteditable>' + data[count].kkm +
                                '</td>';
                            html += '<td><button type="button" name="delete_btn" id="' + data[count].id +
                                '" class="btn btn-outline-danger btn_delete" title="Hapus kelas" data-plugin="tippy" data-tippy-placement="top"><span class="fe-trash" ></span> </button>' + '</td></tr>';
                            // console.log('id' + id);
                        }
                        //hasil looping
                        $('tbody').html(html);
                    }
                });
            } //panggil fungsi load data
            load_data();

            //simpan data
            $(document).on('click', '#btn_add', function() {
                var id_pelajaran = $('#id_pelajaran').text();
                var deskripsi = $('#deskripsi').text();
                var kkm = $('#kkm').text();

                //cek jika inputan kososng
                if (id_pelajaran == '') {
                    // alert('Nama kategori tidak boleh kosong!');
                    Swal.fire({
                        position: "top",
                        type: "warning",
                        title: "Id pelajaran tidak boleh kosong!",
                        showConfirmButton: !1,
                        timer: 1500
                    })
                    return false;
                }
                if (deskripsi == '') {
                    // alert('Nama kategori tidak boleh kosong!');
                    Swal.fire({
                        position: "top",
                        type: "warning",
                        title: "Deskripsi tidak boleh kosong!",
                        showConfirmButton: !1,
                        timer: 1500
                    })
                    return false;
                }

                //cek jika inputan kososng
                if (kkm == '') {
                    // alert('Nama kategori tidak boleh kosong!');
                    Swal.fire({
                        position: "top",
                        type: "warning",
                        title: "KKM kelas tidak boleh kosong!",
                        showConfirmButton: !1,
                        timer: 1500
                    })
                    return false;
                }

                //jika inputan ada isinya, kirim data
                $.ajax({
                    url: "<?= base_url(); ?>ajar/pelajaran/tambah",
                    method: 'POST',
                    //data yang dikirim (variabel : value)
                    data: {
                        id_pelajaran: id_pelajaran,
                        deskripsi: deskripsi,
                        kkm: kkm
                    },
                    //callback jika data berhasil disimpan
                    success: function(data) {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Data berhasil disimpan",
                            showConfirmButton: !1,
                            timer: 1500
                        })
                        load_data();
                    }
                });
            });

            //update data
            $(document).on('blur', '.table_data', function() {
                var id = $(this).data('row_id');
                var table_column = $(this).data('column_name');
                var value = $(this).text();

                $.ajax({
                    url: "<?= base_url(); ?>ajar/pelajaran/update",
                    method: "POST",
                    data: {
                        id: id,
                        table_column: table_column,
                        value: value
                    },
                    success: function(data) {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Data berhasil update",
                            showConfirmButton: !1,
                            timer: 1500
                        })
                        load_data();
                    }
                });
            });

            //delete data
            $(document).on('click', '.btn_delete', function(e) {
                var id = $(this).attr('id');

                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Menghapus data ini!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Hapus!",
                    cancelButtonText: "Tutup!",
                    confirmButtonClass: "btn btn-danger mt-2",
                    cancelButtonClass: "btn btn-secondary ml-2 mt-2",
                    buttonsStyling: !1
                }).then((result) => {
                    if (result.value) {

                        $.ajax({
                            url: "<?= base_url(); ?>ajar/pelajaran/delete",
                            method: "POST",
                            beforeSend: function() {
                                swal({
                                    title: "Menunggu",
                                    'html': "Memproses data",
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            data: {
                                id: id
                            },
                            success: function(data) {
                                swal(
                                    'Hapus',
                                    'Berhasil terhapus',
                                    'success'
                                )
                                load_data();
                            }
                        });
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        swal(
                            'Batal',
                            'Anda membatalkan penghapusan data',
                            'error'
                        )
                    }
                })
            });
        });
    </script>