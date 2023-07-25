<?php $__env->startSection('container'); ?>
    <section>
        <!-- ======= Create Inventory Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Create Barang Masuk</h1>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <form action="<?php echo e(route('store')); ?>" method="post" class="php-email-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mt-3 mb-3">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                        placeholder="Masukkan nama barang" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control" name="harga_beli" id="harga_beli"
                                        placeholder="0" min="0" step="1000" required>
                                </div>
                                
                                <div class="form-group mt-3 mb-3">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        <option disabled selected>-- Pilih Kategori --</option>
                                        <option value="Sepatu">Sepatu</option>
                                        <option value="Baju">Baju</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="jumlah_stok">Jumlah Stok</label>
                                    <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok"
                                        placeholder="0" min="0" required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juand\OneDrive - ypt.or.id\SEMESTER 4\PEMPROGRAMAN FRAMEWORK\tubes\RetailIQ\resources\views/barangmasuk/create-masuk.blade.php ENDPATH**/ ?>