<?php $__env->startSection('container'); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="module">
        $(document).ready(function() {

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Yakin Ingin Menghapus\n" + name + "?",
                    text: "Data Akan Terhapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Yakin!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>


    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-3 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="table-responsive">
                        <table id="InventoryTable" class="table table-striped table-bordered datatable">
                            <thead class="thead-dark">
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
                                            <div class="d-flex">
                                                <form action="<?php echo e(route('inventory.destroy', ['id' => $item->id])); ?>"
                                                    method="POST" class="mr-1">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-danger btn-delete" data-name="<?php echo e($item->nama_barang); ?>">
                                                        <i class="bi-trash"></i>
                                                    </button>
                                                    <a href="<?php echo e(route('inventory.edit', ['id' => $item->id])); ?>" class="btn btn-warning">
                                                        <i class="bi-pencil"></i></a>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/inventory/index.blade.php ENDPATH**/ ?>