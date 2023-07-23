<?php $__env->startSection('container'); ?>
    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-3 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Awal</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Jumlah Terjual</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->nama_barang); ?></td>
                                    <td>Rp<?php echo e(number_format($item->harga_awal, 0, ',', '.')); ?></td>
                                    <td>Rp<?php echo e(number_format($item->harga_jual, 0, ',', '.')); ?></td>
                                    <td><?php echo e($item->stok); ?></td>
                                    <td><?php echo e($item->jumlah_terjual); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('inventory.destroy', ['id' => $item->id])); ?>"
                                            method="POST">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/inventory/index.blade.php ENDPATH**/ ?>