<?php $__env->startSection('container'); ?>
    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <!-- Tampilkan data inventory di sini -->
                <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="inventory-item">
                            <h3><?php echo e($item->nama_barang); ?></h3>
                            <p>Harga Awal: Rp<?php echo e($item->harga_awal); ?></p>
                            <p>Harga Jual: Rp<?php echo e($item->harga_jual); ?></p>
                            <p>Stok: <?php echo e($item->stok); ?></p>
                            <p>Jumlah Terjual: <?php echo e($item->jumlah_terjual); ?></p>
                            <!-- Tambahkan tombol untuk mengedit dan menghapus item inventory -->
                            <div class="actions">
                                <a href="#" class="btn-edit">Edit</a>
                                <form action="#" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juand\OneDrive - ypt.or.id\SEMESTER 4\PEMPROGRAMAN FRAMEWORK\tubes\RetailIQ\resources\views/inventory/index.blade.php ENDPATH**/ ?>