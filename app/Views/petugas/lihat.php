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
                <!-- table pengaduan -->
                <table class="table table-striped" data-aos="fade-up">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tanggal Pengaduan</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12-12-2021</td>
                            <td>182615317163</td>
                            <td>lorem ipsum dolor sit amet</td>
                            <td>DiProses</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<?= $this->endSection() ?>