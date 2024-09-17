<?php $__env->startSection('container'); ?>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Detail Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="php-email-form">
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="<?php echo e($barangmasuk->nama_barang); ?>" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" id="harga_awal"
                                    value="<?php echo e($barangmasuk->harga_awal); ?>" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah"
                                    value="<?php echo e($barangmasuk->jumlah); ?>" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                <?php if($barangmasuk->original_filename): ?>
                                    <h5><?php echo e($barangmasuk->original_filename); ?></h5>
                                    <a href="<?php echo e(route('barangmasuk.downloadFile', ['barangmasukId' => $barangmasuk->id])); ?>" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download Invoice
                                    </a>
                                <?php else: ?>
                                    <h5>Tidak ada</h5>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\RetailIQ\resources\views/barangmasuk/show-masuk.blade.php ENDPATH**/ ?>