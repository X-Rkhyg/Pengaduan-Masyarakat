<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Download Laporan Pengaduan Masyarakat <?= date('Y') ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Lihat Laporan / Download</li>
            </ol>
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-5">
                <a class="btn btn-success btn-md disabled">Harian</a>
                </div>
                <div class="col-md-4 mb-5">
                <a class="btn btn-primary btn-md disabled">Bulanan</a>
                </div>
                <div class="col-md-4 mb-5">
                <a class="btn btn-info btn-md text-white disabled">Tahunan</a>
                </div>
            </div>
            <!-- button download -->
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-3">
                    <a class="btn btn-success btn-md" href="/generatedaily"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Keseluruhan</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-primary btn-md" href="/generatemonthly"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Keseluruhan</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-info btn-md text-white" href="/generateyearly"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Keseluruhan</a>
                </div>
            </div>
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-3">
                    <a class="btn btn-success btn-md" href="/generatedaily_novalidate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Belum Tervalidasi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-primary btn-md" href="/generatemonthly_novalidate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Belum Tervalidasi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-info btn-md text-white" href="/generateyearly_novalidate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Belum Tervalidasi</a>
                </div>
            </div>
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-3">
                    <a class="btn btn-success btn-md" href="/generatedaily_validate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Tervalidasi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-primary btn-md" href="/generatemonthly_validate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Tervalidasi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-info btn-md text-white" href="/generateyearly_validate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Tervalidasi</a>
                </div>
            </div>
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-3">
                    <a class="btn btn-success btn-md" href="/generatedaily_ditanggapi"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Ditanggapi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-primary btn-md" href="/generatemonthly_ditanggapi"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Ditanggapi</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-info btn-md text-white" href="/generateyearly_ditanggapi"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Sudah Ditanggapi</a>
                </div>
            </div>
            <div class="row justify-content-center ms-5">
                <div class="col-md-4 mb-3">
                    <a class="btn btn-success btn-md" href="/generatedaily_ditolak"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Ditolak</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-primary btn-md" href="/generatemonthly_ditolak"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Ditolak</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="btn btn-info btn-md text-white" href="/generateyearly_ditolak"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan Ditolak</a>
                </div>
            </div>
    </main>

    <?php $this->endSection(); ?>