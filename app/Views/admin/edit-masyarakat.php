<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>
<?php $validation = \Config\Services::validation(); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data masyarakat</h1>
            <!-- form ganti Password -->
            <div class="card mb-4">
                <div class="card-body">
                    <?php if (session()->getFlashdata('vall')) : ?>
                        <?= session()->getFlashdata('vall'); ?>
                    <?php endif; ?>
                    <form action="/admin/masyarakat/update/<?= $masyarakat['id_masyarakat']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-1">
                            <label for="nama" class="form-label">NIK <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $masyarakat['nik']; ?>">
                            <!-- validation NIK get from validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nik'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="username" class="form-label">Username <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $masyarakat['username']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="telepon" class="form-label">Telepon <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $masyarakat['telepon']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('telepon'); ?>
                            </div>
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