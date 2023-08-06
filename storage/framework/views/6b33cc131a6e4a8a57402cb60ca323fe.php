<!-- resources/views/barangmasuk/create-masuk.blade.php -->



<?php $__env->startSection('container'); ?>
    <section id="contact" class="contact mt-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h1>Create Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form action="<?php echo e(route('store')); ?>" method="post" class="php-email-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <select class="form-control" name="nama_barang" value="<?php echo e(old('nama_barang')); ?>" id="nama_barang" required>
                                    <option disabled selected>-- Pilih Barang --</option>
                                    <option value="Rolex GMT-Master II">Jam Tangan Rolex GMT-Master II</option>
                                    <option value="Rolex Day-Date">Jam Tangan Rolex Day-Date (Presidential)</option>
                                    <option value="Rolex Yacht-Master">Jam Tangan Rolex Yacht-Master</option>
                                    <option value="Casio Baby-G">Jam Tangan Casio Baby-G</option>
                                    <option value="Casio Classic">Jam Tangan Casio Classic</option>
                                    <option value="Tissot PRC 200">Jam Tangan Tissot PRC 200</option>
                                </select>
                                <?php $__errorArgs = ['nama_barang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" value="<?php echo e(old('harga_awal')); ?>" id="harga_awal"
                                    placeholder="0" min="0" required>
                                <?php $__errorArgs = ['harga_awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" value="<?php echo e(old('jumlah')); ?>" id="jumlah"
                                    placeholder="0" min="0" required>
                                <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                <input type="file" class="form-control" name="Invoice" value="<?php echo e(old('Invoice')); ?>" id="Invoice" required>
                                <?php $__errorArgs = ['invoice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <a href="<?php echo e(route('barangmasuk')); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/barangmasuk/create-masuk.blade.php ENDPATH**/ ?>