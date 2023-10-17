<?= $this->extend('layouts/masyarakat') ?>
<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">
                    Tambahkan pengaduan
                </h1>
                <!-- form tambahkan pengaduan masyarakat -->
                <form data-aos="fade-up">
                    <!-- 3 form input -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIK</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nik Anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Isi Laporan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Laporan Anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Foto</label>
                        <!-- input image -->
                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Laporan Anda">
                    </div>
                </form>

                <!-- tombol input -->
                <div class="text-center text-lg-start" data-aos="fade-up">
                    <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Submit</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<?= $this->endSection() ?>