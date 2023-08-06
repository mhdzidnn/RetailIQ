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
                            <table id="BarangmasukTable" class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px;">ID</th>
                                        <th scope="col" style="width: 400px;">Nama Barang</th>
                                        <th scope="col" style="width: 400px;">Harga Awal</th>
                                        <th scope="col" style="width: 400px;">Jumlah</th>
                                        <th scope="col" style="width: 400px;">Aksi</th>
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
                                                <div class="d-flex">
                                                    <form action="<?php echo e(route('barangmasuk.destroy', ['id' => $item->id])); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button type="submit" class="btn-delete btn-sm" data-name="<?php echo e($item->nama_barang); ?>">
                                                            <i class="bi-trash"></i></button>
                                                        <a href="<?php echo e(route('show', ['id' => $item->id])); ?>" class="btn btn-warning ">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </form>
                                                    
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                            
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
        $('#BarangmasukTable').DataTable({
        processing: true,
            serverSide: true,
            ajax: '<?php echo route('barangmasuk.getData'); ?>',
            columns: [
                { data: 'id', name: 'id', visible: true },
                // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_barang', name: 'nama_barang' },
                { data: 'formatted_harga_awal', name: 'harga_awal' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'desc']],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });
    });

</script>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/barangmasuk/index-masuk.blade.php ENDPATH**/ ?>