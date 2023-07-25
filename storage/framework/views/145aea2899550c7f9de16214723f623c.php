<?php $__env->startSection('container'); ?>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="php-email-form">
                        <div class="create mb-3">
                            <a href="<?php echo e(route('create')); ?>" class="btn-create"><i class="bi bi-plus-square"></i>
                                Input Barang Masuk</a>
                            <a href="<?php echo e(route('barangmasuk.exportExcel')); ?>" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                            <a href="<?php echo e(route('barangmasuk.exportPdf')); ?>" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>
                        </div>
                        <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                            data-aos-delay="200">
                            <table id="BarangmasukTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga Awal</th>
                                        <th scope="col">Jumlah Barang Masuk</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $barangmasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->nama_barang); ?></td>
                                            <td>Rp<?php echo e(number_format($item->harga_awal, 0, ',', '.')); ?></td>
                                            <td><?php echo e($item->jumlah); ?></td>
                                            <td>

                                                <a href="<?php echo e(route('show', ['id' => $item->id])); ?>"
                                                    class="btn-edit">Show</a>
                                                <a href="<?php echo e(route('delete', ['id' => $item->id])); ?>"
                                                    class="btn-delete">Delete</a>
                                                
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#BarangmasukTable').DataTable();
    });
</script>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/barangmasuk/index-masuk.blade.php ENDPATH**/ ?>