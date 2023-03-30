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
    <link rel = "icon" href = "<?= base_url() ?>assets/img/kegiatanmasjid/Logo Al-Furqon-01.png" type = "image/x-icon">
    <title>Masjid Al-Furqon</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-flags.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-payments.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>dist/css/demo.min.css?1674944402" rel="stylesheet" />
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

<body class=" d-flex flex-column">
    <script src="<?= base_url('assets/admin/') ?>dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/admin/') ?>static/logo.svg" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login</h2>
                    <?php if ($this->session->flashdata('msg')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('msg') ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form action="<?= base_url('Login/login') ?>" method="POST" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" placeholder="Your password" name="password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="submit" name="submit" class="btn btn-primary w-100"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/admin/') ?>dist/js/tabler.min.js?1674944402" defer></script>
    <script src="<?= base_url('assets/admin/') ?>dist/js/demo.min.js?1674944402" defer></script>
</body>

</html>