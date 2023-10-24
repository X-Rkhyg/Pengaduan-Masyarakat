<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Validasi Dan Beri Tanggapan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Pengaduan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
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
                                    <td><?= $adu['foto']; ?></td>
                                    <td>
                                        <?php if ($adu['status'] == "0") : ?>
                                            Pending
                                        <?php elseif ($adu['status'] == "1") : ?>
                                            Proses
                                        <?php elseif ($adu['status'] == "2") : ?>
                                            Selesai
                                        <?php endif; ?>
                                    </td>
                                    <!-- button validasi -->
                                    <td>
                                        <a class="btn btn-primary btn-sm"><i class="bi bi-check"></i></a>
                                        <a class="btn btn-info btn-sm"><i class="bi bi-file-earmark-arrow-down"></i></a>
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