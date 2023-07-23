<?php $__env->startSection('container'); ?>
<section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Barang Keluar</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="php-email-form">
                        <div class="create mb-3">
                            <a href="<?php echo e(route('create-keluar')); ?>" class="btn-create"><i class="bi bi-plus-square"></i>
                                Input Barang Keluar
                            </a>
                            <a href="<?php echo e(route('barangkeluar.exportExcel')); ?>" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                            <li class="list-inline-item">
                            <a href="<?php echo e(route('barangkeluar.exportPdf')); ?>" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>
                        </li>
                        </div>
                        <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                            data-aos-delay="200">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Tanggal Beli</th>
                                        <th scope="col">Jumlah Barang Keluar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $barangkeluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->nama_customer); ?></td>
                                            <td><?php echo e($item->nama_barang); ?></td>
                                            <td>Rp<?php echo e(number_format($item->harga_jual, 0, ',', '.')); ?></td>
                                            <td><?php echo e($item->tanggal_beli); ?></td>
                                            <td><?php echo e($item->jumlah_terjual); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('edit-keluar', ['id' => $item->id])); ?>"
                                                    class="btn-edit">Edit</a>
                                                <a href="<?php echo e(route('delete-keluar', ['id' => $item->id])); ?>"
                                                    class="btn-delete">Delete</a>
                                                <a href="<?php echo e(route('show-keluar', ['id' => $item->id])); ?>"
                                                    class="btn-show">Show</a>
                                                
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

    

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('#barangkeluarTable').DataTable();
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juand\OneDrive - ypt.or.id\SEMESTER 4\PEMPROGRAMAN FRAMEWORK\tubes\RetailIQ\resources\views/barangkeluar/index-keluar.blade.php ENDPATH**/ ?>