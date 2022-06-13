<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admninistrator | <?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Techno Kreatif solusindo merupakan sebuah perusahan yang bergerak dibidang penyedia dan pelayanan jasa Teknologi Informasi (TI) yang berdiri sejak 31 Desember 2013. Techno Kreatif Solusindo memfokuskan bisnis pada jasa pengembangan aplikasi untuk pemerintah ataupun pihak swasta.">
    <meta name="keywords" content="Techno Kratif Solusindo, Techno Kreatif, Techno, Website Techno Kreatif, Website Techno Kreatif Solusindo, Webpage Techno Kreatif Solusindo">
    <meta name="author" content="Adi Murdayani, S.Kom.">
    <META NAME="copyright" CONTENT="Copyright © 2022 Adi Murdayani. All Rights Reserved.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <?php if (!empty($get_config)) : ?>
        <link rel="shortcut icon" href="<?= base_url('assets/backend/images/upload/') . $get_config->icon_web ?>">
    <?php endif; ?>
    <!-- Sweet Alert-->
    <link href="<?= base_url('assets/backend/') ?>libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="<?= base_url('assets/backend/') ?>libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="<?= base_url('assets/backend/') ?>libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- Summernote css -->
    <link href="<?= base_url('assets/backend/') ?>libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
    <!-- Lightbox css -->
    <link href="<?= base_url('assets/backend/') ?>libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?= base_url('assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url('assets/backend/') ?>css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <!-- icons -->
    <link href="<?= base_url('assets/backend/') ?>css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .limit-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 10;
            /* number of lines to show */
            line-clamp: 10;
            -webkit-box-orient: vertical;
        }
    </style>

    <style>
        .a-widget-card {
            padding: 5%;
            border: 1px solid #eaeaea;
            background: none;
            border-radius: 5px
        }

        .a-widget-card h2 {
            color: #000
        }

        .a-widget-card p {
            color: #000
        }

        .a-widget-info {
            color: #000;
            text-align: center
        }

        .a-widget-card span {
            font-weight: bold
        }

        .a-widget-card .data {
            font-size: 20px
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">