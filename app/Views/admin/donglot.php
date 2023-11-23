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
            <form class="mt-4 mb-4" action="/generate" method="post">
                <select class="form-select form-select-md mb-3" aria-label="Large select example" name="waktu">
                    <option value="hari" selected>Harian</option>
                    <option value="bulan">Bulanan</option>
                    <option value="tahun">Tahunan</option>
                    <option value="keseluruhan">Keseluruhan</option>
                </select>

                <select class="form-select form-select-md" aria-label="Small select example" name="status">
                    <option value="0" selected>Belum divalidasi</option>
                    <option value="1">Sudah divalidasi</option>
                    <option value="2">Sudah ditanggapi</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="keseluruhan">Keseluruhan</option>
                </select>
                <button type="submit" class="btn btn-primary mt-4">Generate</button>
            </form>
    </main>

    <?php $this->endSection(); ?>