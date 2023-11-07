<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>


<div id="layoutSidenav_content">
    <main>
        <div class="app-content content overflow-hidden">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="container-xxl p-0">
                <div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-2">Edit Data</h5>
                                    <?php if (session()->getFlashdata('vall')) : ?>
                                        <?= session()->getFlashdata('vall'); ?>
                                    <?php endif; ?>
                                    <form action="/admin/masyarakat/update/<?= $masyarakat['id_masyarakat']; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="mb-1">
                                            <label for="nik" class="form-label">NIK <font color="FF7F7F">*</font></label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $masyarakat['nik']; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik'); ?>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="username" class="form-label">Username <font color="FF7F7F">*</font></label>
                                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $masyarakat['username']; ?>">
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

                                        <button type="submit" class="me-1 btn btn-primary mt-2">Submit</button>
                                        <div class="text-end"><small>
                                                <font color="FF7F7F">*</font> required fields
                                            </small></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>