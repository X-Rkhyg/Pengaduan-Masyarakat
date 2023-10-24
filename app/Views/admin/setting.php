<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

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
                    <form action="/admin/gantiPassword" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="passwordLama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="passwordBaru">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="konfirmasiPasswordBaru">
                        </div>
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>