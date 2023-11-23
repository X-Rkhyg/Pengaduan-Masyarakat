<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Management Petugas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Management Petugas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID Petugas</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($petugas as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['id_petugas']; ?></td>
                                    <td><?= $p['nama_petugas']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td>
                                    <?php if ($p['password'] == md5("defaultpassword")) : ?>
                                            <p style="color: FF8400;">defaultpassword</p>
                                        <?php else : ?>
                                            ********
                                        <?php endif; ?></td>
                                    <td><?= $p['telepon']; ?></td>
                                    <td><p style="text-transform: capitalize;"><?= $p['level']; ?></p></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/admin/petugas/edit/<?= $p['id_petugas'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-warning btn-sm" href="/admin/defaultpasspetugas/<?= $p['id_petugas'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Password Akun Ini?')"><i class="bi bi-key"></i></a>
                                        <a class="btn btn-danger btn-sm" href="/admin/petugas/delete/<?= $p['id_petugas'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>