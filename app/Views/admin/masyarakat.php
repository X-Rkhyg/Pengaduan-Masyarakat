<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Management Masyarakat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Management Masyarakat</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
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
                                    <td>
                                        <?php if ($m['password'] == md5("defaultpassword")) : ?>
                                            <p style="color: FF8400;">defaultpassword</p>
                                        <?php else : ?>
                                            ********
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $m['telepon']; ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-md" href="/admin/masyarakat/edit/<?= $m['id_masyarakat'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-warning btn-md" href="/admin/defaultpass/<?= $m['id_masyarakat'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Password Akun Ini?')"><i class="bi bi-key"></i></a>
                                        <a class="btn btn-danger btn-md" href="/admin/masyarakat/delete/<?= $m['id_masyarakat'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="bi bi-trash3"></i></a>
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