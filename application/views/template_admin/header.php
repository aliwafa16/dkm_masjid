<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/img/kegiatanmasjid/Logo Al-Furqon-01.png" type= "image/x-icon">
    <!-- CSS files -->
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-flags.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-payments.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/demo.min.css?1674944402" rel="stylesheet" />

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="<?= base_url('assets/admin/dist/js/jquery.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="<?= base_url('assets/admin/') ?>dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?= base_url('dashboard') ?>">
                        <img src="<?= base_url() ?>assets/img/kegiatanmasjid/Logo Al-Furqon-01.png" width="110" height="32" alt="Masjid Al Furqon" class="navbar-brand-image">
                        <span>Masjid Al Furqon</span>
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/Logo Al-Furqon-01.png" width="110" height="32" alt="Masjid Al Furqon" class="navbar-brand-image">
                            <div class="d-none d-xl-block ps-2">
                                <div><?= $this->session->userdata('username') ?></div>
                                <div class="mt-1 small text-muted">Administator</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="<?= base_url('Login/logout') ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url('Dashboard') ?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?= $title == 'Kegiatan' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url('Setkegiatan') ?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12l0 9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M16 5.25l-8 4.5" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Kegiatan
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown <?= $title == '' ? 'active' : '' ?>">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12l0 9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M16 5.25l-8 4.5" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Master data
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item <?= $title == 'Manajemen Tampilan Awal' ? 'active' : '' ?>" href="<?= base_url('Manajemenhalawal') ?>">
                                                Manajemen Tampilan Awal
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Hari' ? 'active' : '' ?>" href="<?= base_url('Hari') ?>">
                                                Hari
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Penceramah' ? 'active' : '' ?>" href="<?= base_url('Penceramah') ?>">
                                                Penceramah
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Kajian' ? 'active' : '' ?>" href="<?= base_url('Kajian') ?>">
                                                Judul Kajian
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Background' ? 'active' : '' ?>" href="<?= base_url('Background') ?>">
                                                Background
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Rekening' ? 'active' : '' ?>" href="<?= base_url('Rekening') ?>">
                                                Rekening
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Kegiatan Rutin' ? 'active' : '' ?>" href="<?= base_url('Manajemenkegiatan') ?>">
                                                Kegiatan Rutin
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Foto Kegiatan' ? 'active' : '' ?>" href="<?= base_url('Fotokegiatan') ?>">
                                                Foto Kegiatan
                                            </a>
                                            <a class="dropdown-item <?= $title == 'Qris' ? 'active' : '' ?>" href="<?= base_url('Qris') ?>">
                                                Qris
                                            </a>
                                             <a class="dropdown-item <?= $title == 'Pengumuman' ? 'active' : '' ?>" href="<?= base_url('Pengumuman') ?>">
                                                Pengumuman
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>