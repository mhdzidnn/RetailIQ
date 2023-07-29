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
                            <a href="<?php echo e(route('barangkeluar.exportPdf')); ?>" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>
                        </li>
                        </div>
                        <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                            data-aos-delay="200">
                            <table id="BarangkeluarTable" class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px;">ID</th>
                                        <th scope="col" style="width: 400px;">Nama Customer</th>
                                        <th scope="col" style="width: 400px;">Nama Barang</th>
                                        <th scope="col" style="width: 400px;">Harga Jual</th>
                                        <th scope="col" style="width: 400px;">Tanggal Beli</th>
                                        <th scope="col" style="width: 400px;">Jumlah Barang Keluar</th>
                                        <th scope="col" style="width: 400px;">Aksi</th>
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
                                                <a href="<?php echo e(route('delete-keluar', ['id' => $item->id])); ?>"
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


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/barangkeluar/index-keluar.blade.php ENDPATH**/ ?>