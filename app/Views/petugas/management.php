<?= $this->extend('layouts/petugas'); ?>
<?= $this->section('content'); ?>


<div class="shadow-bottom"></div>
<div class="scrollbar-container main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main">
        <li class="nav-item"><a href="/petugas"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg><span class="menu-item text-truncate">Dashboard</span></a></li>
        <li class="nav-item"><a href="/petugas/validasi"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg><span class="menu-item text-truncate">Validasi</span></a></li>
        <li class="nav-item active"><a href="/petugas/management"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                </svg><span class="menu-item text-truncate">Management</span></a></li>
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
                    Management Data masyarakat
                </a></li>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="dropdown-user nav-item dropdown"><a href="/auth/logout" aria-haspopup="true" class="nav-link dropdown-user-link btn btn-outline-primary" aria-expanded="false">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="app-content content overflow-hidden">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="container-xxl p-0">
        <div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Telepon</th>
                        <th>Telepon</th>
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
                                <a class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                                <button class="btn btn-warning btn-sm" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal<?= $m['id_masyarakat']; ?>"><i class="bi bi-info-circle"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
</div>

<?= $this->endSection() ?>