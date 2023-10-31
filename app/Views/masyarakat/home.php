<?= $this->extend('layouts/masyarakat'); ?>
<?= $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$login = session()->getFlashdata('login');
$session = session()
?>

<div class="shadow-bottom"></div>
<div class="scrollbar-container main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main">
        <li class="nav-item active"><a href="/masyarakat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg><span class="menu-item text-truncate">Dashboard</span></a></li>
        <li class="nav-item"><a href="/masyarakat/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg><span class="menu-item text-truncate">Tambahkan Data</span></a></li>
        <li class="nav-item"><a href="/masyarakat/lihat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg><span class="menu-item text-truncate">Lihat Data</span></a></li>
        <li class="navigation-header"><span>Setting</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg></li>
        <li class="nav-item"><a href="/masyarakat/setting"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg><span class="menu-item text-truncate">Setting Akun</span></a></li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 1px; height: 582px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 513px;"></div>
    </div>
</div>
</div>

<nav class="header-navbar navbar align-items-center floating-nav container-xxl navbar-shadow navbar navbar-expand-lg navbar-light">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <li class="d-none d-lg-block nav-item"><a class="nav-link-style nav-link">
                    Beranda
                </a></li>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="dropdown-user nav-item dropdown"><a href="/auth/logout" aria-haspopup="true" class="nav-link dropdown-user-link btn btn-outline-primary" aria-expanded="false">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="app-content content overflow-hidden">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="container-xxl p-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <!-- hari dan tanggal saat ini dalam bahasa indonesia -->
                                    <?php
                                    $hari = date('l');
                                    // jika hari = Tuesday maka hari = selasa
                                    if ($hari == "Tuesday") {
                                        $hari = "Selasa";
                                    } elseif ($hari == "Wednesday") {
                                        $hari = "Rabu";
                                    } elseif ($hari == "Thursday") {
                                        $hari = "Kamis";
                                    } elseif ($hari == "Friday") {
                                        $hari = "Jumat";
                                    } elseif ($hari == "Saturday") {
                                        $hari = "Sabtu";
                                    } elseif ($hari == "Sunday") {
                                        $hari = "Minggu";
                                    } else {
                                        $hari = "Senin";
                                    }
                                    $bulan = date('F');
                                    // jika bulan = January maka bulan = Januari
                                    if ($bulan == "January") {
                                        $bulan = "Januari";
                                    } elseif ($bulan == "February") {
                                        $bulan = "Februari";
                                    } elseif ($bulan == "March") {
                                        $bulan = "Maret";
                                    } elseif ($bulan == "April") {
                                        $bulan = "April";
                                    } elseif ($bulan == "May") {
                                        $bulan = "Mei";
                                    } elseif ($bulan == "June") {
                                        $bulan = "Juni";
                                    } elseif ($bulan == "July") {
                                        $bulan = "Juli";
                                    } elseif ($bulan == "August") {
                                        $bulan = "Agustus";
                                    } elseif ($bulan == "September") {
                                        $bulan = "September";
                                    } elseif ($bulan == "October") {
                                        $bulan = "Oktober";
                                    } elseif ($bulan == "November") {
                                        $bulan = "November";
                                    } else {
                                        $bulan = "Desember";
                                    }
                                    $tanggal = date('d');
                                    $tahun = date('Y');
                                    ?>
                                    <h3 class="fw-bolder mb-75"><?= $hari; ?>, <?= $tanggal; ?> <?= $bulan; ?> <?= $tahun; ?></h3>
                                    <p class="card-text">Date</p>
                                </div>
                                <div class="avatar avatar-stats p-50 m-0 bg-light-danger">
                                    <div class="avatar-content"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75">Online</h3>
                                    <p class="card-text">Status</p>
                                </div>
                                <div class="avatar avatar-stats p-50 m-0 bg-light-primary">
                                    <div class="avatar-content"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?= $jumlah; ?></h3>
                                    <p class="card-text">Jumlah Laporan</p>
                                </div>
                                <div class="avatar avatar-stats p-50 m-0 bg-light-success">
                                    <div class="avatar-content"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <polyline points="17 11 19 13 23 9"></polyline>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75">Masyarakat</h3>
                                    <p class="card-text">Role</p>
                                </div>
                                <div class="avatar avatar-stats p-50 m-0 bg-light-warning">
                                    <div class="avatar-content"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($login) { ?>
            <h5 style="color:green"><?php echo $login ?> <?= $session->get('username'); ?>, Anda berhasil Login</h5>
        <?php } ?>

        <?php if ($pesan) { ?>
            <h5 style="color:green"><?php echo $pesan ?></h5>
        <?php } ?>
    </div>
</div>

<?= $this->endSection(); ?>