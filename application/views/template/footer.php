<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy;
                <?php if (!empty($get_config)) : ?>
                    <?= $get_config->nama_web ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?= base_url('assets/backend/') ?>/js/vendor.min.js"></script>

<!-- third party js -->
<script src="<?= base_url('assets/backend/') ?>/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- third party js ends -->

<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/backend/') ?>libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Summernote js -->
<script src="<?= base_url('assets/backend/') ?>libs/summernote/summernote-bs4.min.js"></script>
<!-- Tippy js-->
<script src="<?= base_url('assets/backend/') ?>libs/tippy.js/tippy.all.min.js"></script>
<!-- Plugins js -->
<script src="<?= base_url('assets/backend/') ?>libs/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>libs/selectize/js/standalone/selectize.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>libs/dropzone/min/dropzone.min.js"></script>
<!-- Magnific Popup-->
<script src="<?= base_url('assets/backend/') ?>libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Gallery Init-->
<script src="<?= base_url('assets/backend/') ?>js/pages/gallery.init.js"></script>
<!-- App js -->
<script src="<?= base_url('assets/backend/') ?>js/app.min.js"></script>


<script>
    // file upload
    $('.input1').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // error
    <?= $this->session->flashdata('error'); ?>
    // sukses
    <?= $this->session->flashdata('success'); ?>
    // delete
    $('.hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda ingin menghapus data ini!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Iya, hapus!",
            cancelButtonText: "Tidak, Tutup!",
            confirmButtonClass: "btn btn-danger mt-2",
            cancelButtonClass: "btn btn-secondary ml-2 mt-2",
            buttonsStyling: !1
        }).
        then(function(t) {
            t.value ? Swal.fire({
                document: location.href = href,
                title: "Dihapus!",
                text: "File anda telah di hapus.",
                type: "success"
            }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                title: "Batal",
                text: "File anda tidak terhapus.",
                type: "error"
            })
        })
    })

    //delete-all
    $("#hapus").hide();
    $(document).ready(function() {

        $("#chack-all").click(function() {
            if ($(this).is(":checked")) {
                $(".check-item").prop("checked", true);
                $("#hapus").show();
            } else {
                $(".check-item").prop("checked", false);
                $("#hapus").hide();
            }
        });

        $("#hapus").click(function(e) {
            e.preventDefault();
            const confirm = $("#form-delete");

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda ingin menghapus data ini!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Iya, hapus!",
                cancelButtonText: "Tidak, Tutup!",
                confirmButtonClass: "btn btn-danger mt-2",
                cancelButtonClass: "btn btn-secondary ml-2 mt-2",
                buttonsStyling: !1
            }).
            then(function(t) {
                t.value ? Swal.fire({
                    document: confirm.submit(),
                    title: "Dihapus!",
                    text: "File anda telah di hapus.",
                    type: "success"
                }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Batal",
                    text: "File anda tidak terhapus.",
                    type: "error"
                })
            })
        });
    });

    $(document).ready(function() {
        $("#basic-datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
        $('#content').summernote({
            height: 230,
            styleWithSpan: false,
            placeholder: "Tulis sesuatu...",
            callbacks: {
                onInit: function(e) {
                    n(e.editor).find(".custom-control-description").addClass("custom-control-label").parent().removeAttr("for")
                }
            }
        });
        $('#isi').summernote({
            height: 230,
            styleWithSpan: false,
            placeholder: "Tulis sesuatu...",
            callbacks: {
                onInit: function(e) {
                    n(e.editor).find(".custom-control-description").addClass("custom-control-label").parent().removeAttr("for")
                }
            }
        });
    });
</script>

</body>

</html>