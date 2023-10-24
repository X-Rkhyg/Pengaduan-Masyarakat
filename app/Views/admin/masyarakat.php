<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Management Masyarakat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Management Masyarakat</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIK</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($masyarakat as $m) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $m['nik']; ?></td>
                                    <td><?= $m['username']; ?></td>
                                    <td><?= $m['password']; ?></td>
                                    <td><?= $m['telepon']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="bi bi-trash3"></i></button>
                                        <button class="btn btn-warning btn-sm" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal<?= $m['id_masyarakat']; ?>"><i class="bi bi-info-circle"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php foreach ($masyarakat as $m) : ?>
            <div class="modal fade" id="Modal<?= $m['id_masyarakat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data</h1>
                        </div>
                        <div class="modal-body">
                            <h6>Id : <?= $m['id_masyarakat']; ?></h6>
                            <h6>NIK : <?= $m['nik']; ?></h6>
                            <h6>Username : <?= $m['username']; ?></h6>
                            <h6>Password : <?= $m['password']; ?></h6>
                            <h6>Telepon : <?= $m['telepon']; ?></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <?php $this->endSection(); ?>