<?php $__env->startSection('container'); ?>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h1>Edit Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form action="<?php echo e(route('update', ['id' => $selected->id])); ?>" method="post" class="php-email-form" enctype="multipart/form-data">
                            <?php echo method_field('post'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <select class="form-control" name="nama_barang" id="nama_barang" required>
                                    <option value="Air Galon Aqua" <?php echo e($selected->nama_barang === 'Air Galon Aqua' ? 'selected' : ''); ?>>Air Galon Aqua</option>
                                    <option value="Air Galon Sanford" <?php echo e($selected->nama_barang === 'Air Galon Sanford' ? 'selected' : ''); ?>>Air Galon Sanford</option>
                                    <option value="Air Galon Mindy" <?php echo e($selected->nama_barang === 'Air Galon Mindy' ? 'selected' : ''); ?>>Air Galon Mindy</option>
                                </select>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" id="harga_awal" placeholder="0" min="0" step="1000" value="<?php echo e($selected->harga_awal); ?>" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" min="0" value="<?php echo e($selected->jumlah); ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                <?php if($selected->original_filename): ?>
                                    <h5><?php echo e($selected->original_filename); ?></h5>
                                    <a href="<?php echo e(route('barangmasuk.downloadFile', ['barangmasukId' => $selected->id])); ?>" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download Invoice
                                    </a>
                                <?php else: ?>
                                    <h5>Tidak ada</h5>
                                <?php endif; ?>
                                <div class="mt-3">
                                    <label for="Invoice" class="form-label">Upload Nota Pembelian (Invoice) Baru</label>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\putramaajid\RetailIQ\resources\views/barangmasuk/edit-masuk.blade.php ENDPATH**/ ?>