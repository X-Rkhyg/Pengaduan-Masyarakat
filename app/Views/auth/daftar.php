<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<?php
$session = \Config\Services::session();
$errors = $session->getFlashdata('username');
$errors2 = $session->getFlashdata('nik');
$errors3 = $session->getFlashdata('password');
$errors4 = $session->getFlashdata('confirm');
$errors5 = $session->getFlashdata('telepon');
?>

<body style="background-image: url(/assets/img/hero-bg.png);">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/img/okee.png" alt="">
                <span>Aplikasi Pengaduan Masyarakat</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="/auth/login">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">

        <style>
            .teks-color {
                /* make a gradient text color */
                background: linear-gradient(180deg, #7a73ee, #2f00ff);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.8) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5 mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight teks-color">
                        Selamat Datang Di Aplikasi Pendataan Penduduk<br>
                    </h1>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="/authmasyarakat/valid_register">

                                <div class="row">
                                    <?php if ($errors) { ?>
                                        <a for="errors" class="form-label mb-1 col" style="color: red;"><?php echo $errors ?></a>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <?php if ($errors2) { ?>
                                        <a for="errors" class="form-label mb-1 col" style="color: red;"><?php echo $errors2 ?></a>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <?php if ($errors3) { ?>
                                        <a for="errors" class="form-label mb-1 col" style="color: red;"><?php echo $errors3 ?></a>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <?php if ($errors4) { ?>
                                        <a for="errors" class="form-label mb-1 col" style="color: red;"><?php echo $errors4 ?></a>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <?php if ($errors5) { ?>
                                        <a for="errors" class="form-label mb-1 col" style="color: red;"><?php echo $errors5 ?></a>
                                    <?php } ?>
                                </div>

                                <div class="form-outline mb-4 mt-1">
                                    <label class="form-label" for="form3Example3">Username :</label>
                                    <input name="username" id="form3Example3" class="form-control" placeholder="Yourname" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Password :</label>
                                    <input type="password" name="password" id="form3Example3" class="form-control" placeholder="Yourname123" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Konfirmasi Password :</label>
                                    <input type="password" name="confirm" id="form3Example3" class="form-control" placeholder="Yourname123" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">NIK :</label>
                                    <input type="text" name="nik" id="form3Example3" class="form-control" placeholder="Yourname123" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">NO. TELEPON :</label>
                                    <input type="text" name="telepon" id="form3Example3" class="form-control" placeholder="Yourname123" required />
                                </div>

                                <div class="mb-3">
                                    <a>Sudah Memilki Akun? <a href="/auth/login">Login</a></a>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block btn-lg mb-4" name="login">
                                    Daftar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <?= $this->endSection() ?>