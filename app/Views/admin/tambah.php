<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Petugas</h1>
            <!-- form ganti Password -->
            <div class="card mb-4">
                <div class="card-body">
                    <?php if (session()->getFlashdata('vall')) : ?>
                        <?= session()->getFlashdata('vall'); ?>
                    <?php endif; ?>
                    <form action="/admin/savepetugas" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-1">
                            <label for="nama_petugas" class="form-label">Nama Petugas <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_petugas')) ? 'is-invalid' : ''; ?>" id="nama_petugas" name="nama_petugas">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_petugas'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="username" class="form-label">Username <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label">Password <font color="FF7F7F">*</font></label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="confirm" class="form-label">Confirm <font color="FF7F7F">*</font></label>
                            <input type="password" class="form-control <?= ($validation->hasError('confirm')) ? 'is-invalid' : ''; ?>" id="confirm" name="confirm">
                            <div class="invalid-feedback">
                                <?= $validation->getError('confirm'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="telepon" class="form-label">Telepon <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon">
                            <div class="invalid-feedback">
                                <?= $validation->getError('telepon'); ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Level <font color="FF7F7F">*</font></label>
                            <select class="form-select" name="level" aria-label="Default select example">
                                <option value="petugas" selected>Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="me-1 btn btn-primary">Tambahkan</button>
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