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
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($aduan as $adu) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $adu['isi_laporan']; ?></td>
                                    <td>
                                        <img src="/foto_storage/<?= $adu['foto'] ?>" alt="Image" style="width: 200px; height: 130px;">
                                    </td>
                                    <td>
                                        <?php if ($adu['status'] == "0") : ?>
                                            Pending
                                        <?php elseif ($adu['status'] == "1") : ?>
                                            Proses
                                        <?php elseif ($adu['status'] == "2") : ?>
                                            Selesai
                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <?php if ($adu['status'] == "0") : ?>
                                            <a class="btn btn-primary btn-sm" href="/pengaduanpetugas/validasi/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-check"></i></a>
                                        <?php elseif ($adu['status'] == "1") : ?>
                                            <a class="btn btn-primary btn-sm" href="/pengaduanpetugas/tanggapan/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-envelope"></i></a>
                                        <?php elseif ($adu['status'] == "2") : ?>
                                            Selesai
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

    <?php $this->endSection(); ?>