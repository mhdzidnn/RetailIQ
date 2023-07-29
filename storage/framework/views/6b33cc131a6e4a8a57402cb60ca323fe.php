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
                                <select class="form-control" name="nama_barang" id="nama_barang" required>
                                    <option disabled selected>-- Pilih Kategori --</option>
                                    <option value="Air Galon Aqua">Air Galon Aqua</option>
                                    <option value="Air Galon Sanford">Air Galon Sanford</option>
                                    <option value="Air Galon Mindy">Air Galon Mindy</option>
                                </select>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" id="harga_awal"
                                    placeholder="0" min="0" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah"
                                    placeholder="0" min="0" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                <input type="file" class="form-control" name="Invoice" id="Invoice" required>
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