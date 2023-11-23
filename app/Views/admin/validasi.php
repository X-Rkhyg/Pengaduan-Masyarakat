<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Validasi Dan Beri Tanggapan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Pengaduan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal Laporan</th>
                                <th>Judul Laporan</th>
                                <th>Isi Laporan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($aduan as $adu) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= date('d F Y', strtotime($adu['tanggal_pengaduan'])); ?></td>
                                    <td><?= $adu['judul'] ?></td>
                                    <td><p style="width: 600px; word-wrap:break-word;"><?= $adu['isi_laporan']; ?></p></td>
                                    <td>
                                        <?php if ($adu['status'] == "0") : ?>
                                            Pending
                                        <?php elseif ($adu['status'] == "1") : ?>
                                            Proses
                                        <?php elseif ($adu['status'] == "2") : ?>
                                            Selesai
                                        <?php elseif ($adu['status'] == "3") : ?>
                                            Ditolak
                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <?php if ($adu['status'] == "0") : ?>
                                            <a class="btn btn-info btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $adu['id_pengaduan'] ?>"><i class="bi bi-card-image"></i></a>
                                            <a class="btn btn-primary btn-md" href="/pengaduanadmin/validasi/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-check-lg"></i></a>
                                            <a class="btn btn-danger btn-md" href="/pengaduanadmin/validasi/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-x-lg"></i></a>
                                        <?php elseif ($adu['status'] == "1") : ?>
                                            <a class="btn btn-info btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $adu['id_pengaduan'] ?>"><i class="bi bi-card-image"></i></a>
                                            <a class="btn btn-primary btn-md" href="/pengaduanadmin/tanggapan/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-envelope"></i></a>
                                        <?php elseif ($adu['status'] == "2") : ?>
                                            <a class="btn btn-info btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $adu['id_pengaduan'] ?>"><i class="bi bi-card-image"></i></a>
                                            <a class="btn btn-secondary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Tanggapan<?= $adu['id_pengaduan'] ?>"><i class="bi bi-chat-dots"></i></a>
                                        <?php elseif ($adu['status'] == "3") : ?>
                                            <a class="btn btn-danger btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $adu['id_pengaduan'] ?>"><i class="bi bi-exclamation-octagon"></i></a>
                                            <a class="btn btn-secondary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Ditolak<?= $adu['id_pengaduan'] ?>"><i class="bi bi-chat-dots"></i></a>
                                        <?php endif; ?>
                                    </td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php foreach ($aduan as $adu) : ?>
    <div class="modal fade" id="Modal<?= $adu['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
                </div>
                <div class="modal-body">
                    <!-- foto pengaduan -->
                    <img src="/foto_storage/<?= $adu['foto'] ?>" alt="Image" style="width: auto; height: auto; max-width: 100%; max-height: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($aduan as $adu) : ?>
    <div class="modal fade" id="Tolak<?= $adu['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rejected</h1>
                </div>
                <div class="modal-body">
                    <!-- foto pengaduan -->
                    Laporan ini ditolak
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($tanggapan as $t) : ?>
    <div class="modal fade" id="Tanggapan<?= $t['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapan</h1>
                </div>
                <div class="modal-body">
                    <!-- foto pengaduan -->
                    <p><?= $t['tanggapan'] ?><p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    <?php $this->endSection(); ?>