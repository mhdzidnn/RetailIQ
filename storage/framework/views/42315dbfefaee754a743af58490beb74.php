<?php $__env->startSection('container'); ?>
    <section>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Optimalkan Kinerja dan Keuntungan Bisnis</h1>
                        <h2>Kelola barang masuk, barang keluar dan inventory anda, serta atur keuangan dengan lebih mudah dan efisien. Coba sekarang
                            untuk meningkatkan efektivitas toko anda!</h2>
                        <div>
                            <a href="/inventory" class="btn-get-started scrollto">Coba Inventory</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="assets/img/section2-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">

                    <div class="row justify-content-between">
                        <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                            <img src="assets/img/tentang-kami2.png" class="img-fluid" alt="" data-aos="zoom-in">
                        </div>
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <h3 data-aos="fade-up">Tentang Kami</h3>
                            <p data-aos="fade-up" data-aos-delay="100">
                                RetailIQ adalah sebuah sistem informasi yang dirancang untuk membantu pengelolaan barang,
                                penjualan, dan keuangan pada toko retailer secara efektif dan efisien. Aplikasi ini akan memberikan
                                kemudahan bagi pemilik toko untuk mengelola stok barang, memonitor penjualan, serta mengatur
                                keuangan dengan lebih mudah. Dengan demikian, RetailIQ ini dapat membantu pemilik toko
                                untuk mengoptimalkan kinerja toko retailer anda, serta meningkatkan keuntungan bisnis.
                            </p>
                            <div class="row">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-box-seam-fill"></i>
                                    <h4>Kelola Inventory</h4>
                                    <p>Kelola barang masuk & barang keluar dengan efisien dan mudah menggunakan platform kami untuk meningkatkan produktivitas
                                    </p>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-wallet"></i>
                                    <h4>Finansial Penjualan</h4>
                                    <p>Menampilkan financial dari hasil penjualan yang telah dilakukan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End About Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title2">
                        <h2>Layanan Kami</h2>
                        <p>Lihatlah layanan hebat yang kami tawarkan!</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-handbag"></i></div>
                                <h4 class="title"><a href="#">Inventaris</a></h4>
                                <p class="description">Melacak dan mengelola stok produk secara efisien, memastikan ketersediaan barang yang akurat dan memberikan informasi terkini mengenai jumlah dan jenis produk yang tersedia.</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-wallet2"></i></div>
                                <h4 class="title"><a href="">Barang Masuk & Keluar</a></h4>
                                <p class="description">Mengontrol barang masuk dan barang keluar secara efisien, guna mengintegrasikan ke fitur inventory</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-currency-dollar"></i></div>
                                <h4 class="title"><a href="">Finance</a></h4>
                                <p class="description">Pelacakan dan analisis secara real-time terhadap transaksi, pendapatan, dan pengeluaran, membantu pengguna dalam mengelola dan mengoptimalkan keuangan mereka dengan lebih efektif dan efisien.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Services Section -->



        </main><!-- End #main -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Downloads\RetailIQ\RetailIQ\resources\views/landing-page.blade.php ENDPATH**/ ?>