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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-users font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span data-plugin="counterup"><?= $total_team ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Siswa</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-message-square font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $total_kontak ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Guru</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-check-circle font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $pengunjung_online ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Visitor Online</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-eye font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $total_pengunjung ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Visitor</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-box">

                        <div class="widget-chart text-center" dir="ltr">

                            <div id="total-revenue" class="mt-0" data-colors="#f1556c"></div>

                            <div class="alert alert-success bg-success text-white border-0" role="alert">
                                Selamat Datang di <strong>Website SMA Negeri 7 Luwu Timur</strong>
                            </div>
                            <?php if (!empty($get_tentang)) : ?>
                                <div class="limit-text"><?= $get_tentang->isi ?></div>
                                <div class="row mt-3">
                                    <div class="col-4">

                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Tanggal Update</p>
                                        <div class="badge badge-success"><?= $get_tentang->updated_at ?></div>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Tanggal Pos</p>
                                        <div class="badge badge-warning"><?= $get_tentang->created_at ?></div>
                                    </div>
                                </div>

                            <?php endif ?>

                        </div>
                    </div> <!-- end card-box -->
                </div>
                <div class="col-lg-8">
                    <div class="card-box pb-2">

                        <h4 class="header-title mb-3">Statistik Pengunjung</h4>

                        <div dir="ltr">
                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <?php $this->load->view('template/footer'); ?>
    <?php
    //Inisialisasi nilai variabel awal
    $tanggal = "";
    $total_pengunjung = null;
    foreach ($get_total_hits as $item) {
        $jum = $item->hits;
        $total_pengunjung .= "$jum" . ", ";

        $tang = $item->date;
        $tanggal .= "'$tang'" . ", ";
    }
    ?>
    <script>
        var dataColors;
        colors = ["#1abc9c"];
        (dataColors = $("#sales-analytics").data("colors")) && (colors = dataColors.split(","));
        var chart;
        options = {
            series: [{
                name: "Pengunjung",
                type: "column",
                data: [<?= $total_pengunjung ?>]
            }, {
                name: "Online",
                type: "line",
                data: [<?= $total_pengunjung ?>]
            }],
            chart: {
                height: 378,
                type: "line"
            },
            stroke: {
                width: [2, 3]
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%"
                }
            },
            colors: colors,
            dataLabels: {
                enabled: !0,
                enabledOnSeries: [1]
            },
            labels: [<?= $tanggal ?>],
            xaxis: {
                type: "datetime"
            },
            legend: {
                offsetY: 7
            },
            grid: {
                padding: {
                    bottom: 20
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .25,
                    gradientToColors: void 0,
                    inverseColors: !0,
                    opacityFrom: .75,
                    opacityTo: .75,
                    stops: [0, 0, 0]
                }
            },
            yaxis: [{
                title: {
                    text: "Range"
                }
            }]
        };

        (chart = new ApexCharts(document.querySelector("#sales-analytics"), options)).render(), $("#dash-daterange").flatpickr({
            altInput: !0,
            mode: "range",
            altFormat: "F j, y",
            defaultDate: "today"
        });
    </script>