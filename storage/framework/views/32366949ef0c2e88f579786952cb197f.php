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
                                <table id="BarangkeluarTable" class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 100px;">ID</th>
                                            <th scope="col" style="width: 250px;">Nama Customer</th>
                                            <th scope="col" style="width: 250px;">Nama Barang</th>
                                            <th scope="col" style="width: 250px;">Harga Jual</th>
                                            <th scope="col" style="width: 250px;">Tanggal Beli</th>
                                            <th scope="col" style="width: 250px;">Jumlah</th>
                                            <th scope="col" style="width: 250px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                                 --}}
                                                
                                            
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