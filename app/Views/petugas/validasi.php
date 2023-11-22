<?= $this->extend('layouts/petugas'); ?>
<?= $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
?>

<div class="shadow-bottom"></div>
<div class="scrollbar-container main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main">
        <li class="nav-item"><a href="/petugas"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg><span class="menu-item text-truncate">Dashboard</span></a></li>
        <li class="nav-item active"><a href="/petugas/validasi"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg><span class="menu-item text-truncate">Validasi</span></a></li>
        <li class="nav-item"><a href="/petugas/management"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                </svg><span class="menu-item text-truncate">Management</span></a></li>
        <li class="navigation-header"><span>Setting</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg></li>
        <li class="nav-item"><a href="/petugas/setting"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg><span class="menu-item text-truncate">Setting Akun</span></a></li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 1px; height: 582px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 513px;"></div>
    </div>
</div>
</div>

<nav class="header-navbar navbar align-items-center floating-nav container-xxl navbar-shadow navbar navbar-expand-lg navbar-light">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <li class="d-none d-lg-block nav-item"><a class="nav-link-style nav-link">
                    Validasi Data Pengaduan
                </a></li>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="dropdown-user nav-item dropdown"><a href="/auth/logoutpetugas" aria-haspopup="true" class="nav-link dropdown-user-link btn btn-outline-primary" aria-expanded="false">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php if ($pesan) { ?>
    <?php echo $pesan ?>
<?php } ?>

<div class="app-content content overflow-hidden">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="container-xxl p-0">
        <div>
            <table id="datatablesSimple" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Isi Laporan</th>
                        <th>Lokasi</th>
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
                            <td><?= $adu['judul']; ?></td>
                            <td style="width: 350px; word-wrap:break-word;"><?= $adu['isi_laporan']; ?></td>
                            <td style="width: 100px; word-wrap:break-word;"><?= $adu['lokasi']; ?></td>
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
                                    <a class="btn btn-danger btn-md" href="/pengaduanpetugas/tolak/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-x-lg"></i></a>
                                    <a class="btn btn-primary btn-md" href="/pengaduanpetugas/validasi/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-check-lg"></i></a>
                                <?php elseif ($adu['status'] == "1") : ?>
                                    <a class="btn btn-info btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $adu['id_pengaduan'] ?>"><i class="bi bi-card-image"></i></a>
                                    <a class="btn btn-primary btn-md" href="/pengaduanpetugas/tanggapan/<?= $adu['id_pengaduan'] ?>"><i class="bi bi-envelope"></i></a>
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
                    <p><?= $t['tanggapan'] ?>
                    <p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    function toggleReadMore() {
        var container = document.getElementById('myContainer');
        container.classList.toggle('expanded');
    }
</script>

<?= $this->endSection() ?>