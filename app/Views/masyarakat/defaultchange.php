<?= $this->extend('layouts/masyarakat'); ?>
<?= $this->section('content'); ?>

<div class="shadow-bottom"></div>
</div>
<nav class="header-navbar navbar align-items-center floating-nav container-xxl navbar-shadow navbar navbar-expand-lg navbar-light">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <li class="d-none d-lg-block nav-item"><a class="nav-link-style nav-link">
                    Buat Password
                </a></li>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
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
                            <form action="/masyarakat/defaultchange/save" method="post" enctype="multipart/form-data">
                                <div class="mb-1"><label for="name" class="form-label form-label">Password Baru<font color="FF7F7F">*</font></label><input name="passwordBaru" placeholder="masukan password..." type="text" class="form-control"></div>
                                <!-- upload foto -->
                                <button type="submit" class="me-1 btn btn-primary">Create</button>
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