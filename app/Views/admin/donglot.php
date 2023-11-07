<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Laporan Pengaduan Masyarakat 2023</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Lihat Laporan / Download</li>
            </ol>
            <!-- button download -->
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-success btn-md" href="/generate"><i class="bi bi-file-earmark-arrow-down"></i> Download Laporan</a>
                </div>
            </div>
    </main>

    <?php $this->endSection(); ?>