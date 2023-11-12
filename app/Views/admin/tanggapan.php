<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
$session = session()
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Beri Tanggapan</h1>
            <!-- form ganti Password -->
            <div class="card mb-4">
                <div class="card-body">
                    <?php if (session()->getFlashdata('vall')) : ?>
                        <?= session()->getFlashdata('vall'); ?>
                    <?php endif; ?>
                    <form action="/pengaduanadmin/updatetanggapan/<?= $aduan['id_pengaduan']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-1">
                            <label for="tanggapan" class="form-label">Tanggapan <font color="FF7F7F">*</font></label>
                            <input type="text" class="form-control" id="tanggapan" name="tanggapan">
                        </div>


                        <button type="submit" class="me-1 btn btn-primary">Beri Tanggapan</button>
                        <div class="text-end"><small>
                                <font color="FF7F7F">*</font> required fields
                            </small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php $this->endSection(); ?>