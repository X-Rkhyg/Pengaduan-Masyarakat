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
    </main>

    <?php $this->endSection(); ?>