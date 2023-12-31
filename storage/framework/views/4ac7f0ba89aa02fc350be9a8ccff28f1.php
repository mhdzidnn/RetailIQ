

<?php $__env->startSection('container'); ?>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Edit Barang Keluar</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                        data-aos-delay="200">
                        <form action="<?php echo e(route('update-keluar', ['id' => $selected->id])); ?>" method="post" class="php-email-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_customer">Nama Customer</label>
                                <input type="text" name="nama_customer" class="form-control" id="nama_customer"
                                    value="<?php echo e($selected->nama_customer); ?>" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <select class="form-control" name="nama_barang" id="nama_barang" required>
                                    <option value="Air Galon Aqua" <?php echo e($selected->nama_barang == 'Air Galon Aqua' ? 'selected' : ''); ?>>Air Galon Aqua</option>
                                    <option value="Air Galon Sanford" <?php echo e($selected->nama_barang == 'Air Galon Sanford' ? 'selected' : ''); ?>>Air Galon Sanford</option>
                                    <option value="Air Galon Mindy" <?php echo e($selected->nama_barang == 'Air Galon Mindy' ? 'selected' : ''); ?>>Air Galon Mindy</option>
                                </select>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                                    value="<?php echo e($selected->harga_jual); ?>" min="0" step="1000" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="tanggal_beli">Tanggal Beli</label>
                                <input type="number" class="form-control" name="tanggal_beli" id="tanggal_beli"
                                    value="<?php echo e($selected->tanggal_beli); ?>" min="0" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah_terjual">Jumlah Terjual</label>
                                <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                                    value="<?php echo e($selected->jumlah_terjual); ?>" min="0" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Penjualan (Invoice)</label>
                                <?php if($selected->original_filename): ?>
                                    <h5><?php echo e($selected->original_filename); ?></h5>
                                    <a href="<?php echo e(route('barangkeluar.downloadFile', ['barangkeluarId' => $selected->id])); ?>" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download Invoice
                                    </a>
                                <?php else: ?>
                                    <h5>Tidak ada</h5>
                                <?php endif; ?>
                                <div class="mt-3">
                                    <label for="Invoice" class="form-label">Upload Nota Penjualan (Invoice) Baru</label>
                                    <input type="file" class="form-control" name="Invoice" id="Invoice">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juand\OneDrive - ypt.or.id\SEMESTER 4\PEMPROGRAMAN FRAMEWORK\tubes\RetailIQ\resources\views/barangkeluar/edit-keluar.blade.php ENDPATH**/ ?>