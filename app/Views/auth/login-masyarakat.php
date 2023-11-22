<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

<?php
$session = \Config\Services::session();
$errors = $session->getFlashdata('errors');
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
                <li><a class="getstarted scrollto" href="/auth/daftar">Daftar</a></li>
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
                    Selamat Datang Di Aplikasi Pengaduan Masyarakat<br>
                </h1>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="post" action="/auth/valid_login">

                            <?php if ($errors) { ?>
                                <p style="color:red"><?php echo $errors ?></p>
                                    <?php } ?>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Username :</label>
                                        <input type="text" name="username" id="form3Example3" class="form-control" placeholder="enter username.." required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Password :</label>
                                        <input type="password" name="password" id="form3Example3" class="form-control" placeholder="enter password.." required />
                                    </div>

                                    <div class="mb-3">
                                        <a>Not Have Account? <a href="/auth/daftar">Daftar</a></a>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block btn-lg mb-4" name="login">
                                        Login
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