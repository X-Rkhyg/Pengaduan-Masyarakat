<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$login = session()->getFlashdata('login');
$session = session()
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php if ($login) { ?>
                <h5 style="color:green"><?php echo $login ?> <?= $session->get('username'); ?>, Anda berhasil Login</h5>
            <?php } ?>
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-4">
                    <div class="card bg-secondary">
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
                <div class="col-sm-3 col-lg-3">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?= $jumlah; ?> </h3>
                                    <p class="card-text">Jumlah Total Pengaduan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?= $jumlahBelumValidasi; ?></h3>
                                    <p class="card-text">Jumlah Pengaduan Belum Di Validasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?= $jumlahSudahTanggapi; ?></h3>
                                    <p class="card-text">Jumlah Pengaduan Sudah Di Tanggapi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?= $jumlahSudahValidasi; ?></h3>
                                    <p class="card-text">Jumlah Pengaduan Sudah Di Validasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>