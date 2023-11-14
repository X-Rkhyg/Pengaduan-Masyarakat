<?= $this->extend('layouts/masyarakat'); ?>
<?= $this->section('content'); ?>

<div class="shadow-bottom"></div>
<div class="scrollbar-container main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main">
        <li class="nav-item"><a href="/masyarakat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg><span class="menu-item text-truncate">Dashboard</span></a></li>
        <li class="nav-item active"><a href="/masyarakat/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg><span class="menu-item text-truncate">Tambahkan Data</span></a></li>
        <li class="nav-item"><a href="/masyarakat/lihat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg><span class="menu-item text-truncate">Lihat Data</span></a></li>
        <li class="navigation-header"><span>Setting</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg></li>
        <li class="nav-item"><a href="/masyarakat/setting"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    Tambah Data Pengaduan
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
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php if (session()->getFlashdata('vall')) : ?>
                                <?= session()->getFlashdata('vall'); ?>
                            <?php endif; ?>
                            <form action="/masyarakat/save" method="post" enctype="multipart/form-data">
                                <div class="mb-1"><label for="judul" class="form-label form-label">Judul<font color="FF7F7F">*</font></label><input name="judul" placeholder="Judul Laporan Anda" type="text" class="form-control"></div>
                                <div class="mb-1"><label for="isi_laporan" class="form-label form-label">Isi Laporan<font color="FF7F7F">*</font></label><textarea name="isi_laporan" placeholder="Laporan Anda" type="text" class="form-control"></textarea></div>
                                <!-- lokasi -->
                                <div class="mb-1"><label for="lokasi" class="form-label form-label">Lokasi<font color="FF7F7F">*</font></label><input name="lokasi" placeholder="Lokasi Laporan Anda" type="text" class="form-control"></div>
                                <!-- upload foto -->
                                <div class="mb-1"><label for="name" class="form-label form-label">Foto<font color="FF7F7F">*</font></label><input name="foto" placeholder="Laporan Anda" type="file" class="form-control"></div>
                                <button type="submit" class="me-1 btn btn-primary">Submit</button>
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

<?= $this->endSection(); ?>