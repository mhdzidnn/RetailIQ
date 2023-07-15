<?php $__env->startSection('container'); ?>
    <section>
        <!-- ======= Create Inventory Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Edit Inventory</h1>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <form action="<?php echo e(route('update-inventory', ['id' => $selected->id])); ?>" method="post" class="php-email-form">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group mt-3 mb-3">
                                    <input type="text" name="id" class="form-control" id="id" value="<?php echo e($selected->id); ?>" hidden required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                        value="<?php echo e($selected->nama_barang); ?>" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control" name="harga_beli" id="harga_beli"
                                        value="<?php echo e($selected->harga_beli); ?>" min="0" step="1000" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                                        value="<?php echo e($selected->harga_jual); ?>" min="0" step="1000" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        <option disabled selected>-- Pilih Kategori --</option>
                                        <option value="Sepatu" <?php echo e($selected->kategori == "Sepatu" ? 'selected' : ''); ?>>Sepatu</option>
                                        <option value="Baju" <?php echo e($selected->kategori == "Baju" ? 'selected' : ''); ?>>Baju</option>
                                        <option value="Elektronik" <?php echo e($selected->kategori == "Elektronik" ? 'selected' : ''); ?>>Elektronik</option>
                                        <option value="Mainan" <?php echo e($selected->kategori == "Mainan" ? 'selected' : ''); ?>>Mainan</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="jumlah_stok">Jumlah Stok</label>
                                    <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok"
                                        value="<?php echo e($selected->jumlah_stok); ?>" min="0" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="jumlah_terjual">Jumlah Terjual</label>
                                    <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                                        value="<?php echo e($selected->jumlah_terjual); ?>" min="0" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </section>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\putramaajid\Downloads\mbah-jiwo-main\mbah-jiwo-main\resources\views/inventory/edit-inventory.blade.php ENDPATH**/ ?>