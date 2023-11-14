<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1>
                    Layanan Aspirasi dan Pengaduan Online Masyarakat
                </h1>
                <h2>
                    Sampaikan laporan Anda langsung kepada instansi pemerintah
                    berwenang
                </h2>
                <div>
                    <div class="text-center text-lg-start">
                        <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Pelajari Lebih Lanjut</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img">
                <img src="assets/img/okee.png" class="img-fluid" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <div class="content">
                        <h3>Tentang Pengaduan Masyarakat</h3>
                        <p>
                            Pengelolaan pengaduan pelayanan publik di setiap organisasi
                            penyelenggara di Indonesia belum terkelola secara efektif dan
                            terintegrasi. Masing-masing organisasi penyelenggara mengelola
                            pengaduan secara parsial dan tidak terkoordinir dengan baik.
                            Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan
                            bisa terjadi suatu pengaduan tidak ditangani oleh satupun
                            organisasi penyelenggara, dengan alasan pengaduan bukan
                            kewenangannya. Oleh karena itu, untuk mencapai visi dalam good
                            governance maka perlu untuk mengintegrasikan sistem
                            pengelolaan pengaduan pelayanan publik dalam satu pintu.
                            Tujuannya, masyarakat memiliki satu saluran pengaduan secara
                            Nasional.

                            Untuk itu Pemerintah Republik Indonesia membentuk Sistem
                            Pengelolaan Pengaduan Masyarakat -
                            Layanan Aspirasi dan Pengaduan Online Rakyat adalah
                            layanan penyampaian semua aspirasi dan pengaduan masyarakat
                            Indonesia melalui beberapa kanal pengaduan yaitu website
                            Pengaduan Masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12 col-md-12">
                    <div class="count-box justify-content-center">
                        <i class="bi bi-info-circle"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah; ?>" data-purecounter-duration="1" class="purecounter"><?= $jumlah; ?></span>
                            <p>JUMLAH LAPORAN SEKARANG</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <?= $this->endSection() ?>