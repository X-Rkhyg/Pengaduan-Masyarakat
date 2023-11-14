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
            <!-- form ganti Password -->
            <div class="card mb-4">
                <div class="card-body">
                    <?php if ($pesan) { ?>
                        <?php echo $pesan ?>
                    <?php } ?>
                    <form action="/admin/ganti_password/<?= $session->get('id_petugas'); ?>" method="post">
                        <?= csrf_field(); ?>

                        <div class="mb-1">
                            <label for="nama" class="form-label">Nama <font color="FF7F7F">*</font></label>
                            <input name="nama_petugas" type="text" class="form-control" autocomplete="off" placeholder="Masukan Nama Baru" value="<?= $session->get('nama_petugas'); ?>">
                        </div>

                        <div class="mb-1">
                            <label for="username" class="form-label">Username <font color="FF7F7F">*</font></label>
                            <input name="username" type="text" class="form-control" autocomplete="off" placeholder="Masukan Username Baru" value="<?= $session->get('username'); ?>" readonly>
                        </div>

                        <div class="mb-1">
                            <label for="passwordLama" class="form-label">Password Lama</label>
                            <input name="passwordLama" type="password" class="form-control" autocomplete="off" placeholder="Password Lama Anda">
                        </div>

                        <div class="mb-1">
                            <label for="passwordBaru" class="form-label">Password Baru</label>
                            <input name="passwordBaru" type="password" class="form-control" autocomplete="off" placeholder="Password Baru Anda">
                        </div>

                        <div class="mb-1">
                            <label for="confirm" class="form-label">Konfirmasi Password Baru</label>
                            <input name="confirm" type="password" class="form-control" placeholder="Konfirmasi Password Baru Anda">
                        </div>

                        <div class="mb-1">
                            <label for="nama" class="form-label">Level <font color="FF7F7F">*</font></label>
                            <input name="level" type="text" class="form-control" value="<?= $session->get('level'); ?>" readonly>
                        </div>

                        <button type="submit" class="me-1 btn btn-primary">Simpan Perubahan</button>
                        <div class="text-end"><small>
                                <font color="FF7F7F">*</font> required fields
                            </small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>