<?php $__env->startSection('container'); ?>
    <section id="edit-inventory" class="edit-inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Edit Inventory Item</h1>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto mt-3" data-aos="fade-up" data-aos-delay="200">
                    <form action="<?php echo e(route('inventory.update', ['id' => $inventory->id])); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="<?php echo e($inventory->nama_barang); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_awal" class="form-label">Harga Awal</label>
                            <input type="text" class="form-control" id="harga_awal" name="harga_awal"
                                value="<?php echo e($inventory->harga_awal); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                value="<?php echo e($inventory->harga_jual); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?php echo e($inventory->stok); ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                            <input type="number" class="form-control" id="jumlah_terjual" name="jumlah_terjual"
                                value="<?php echo e($inventory->jumlah_terjual); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\RetailIQ\resources\views/inventory/edit.blade.php ENDPATH**/ ?>