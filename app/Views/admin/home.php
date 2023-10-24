<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            Selamat Datang <?= $session->get('nama_petugas'); ?>
    </main>

    <?php $this->endSection(); ?>