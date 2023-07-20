@extends('layouts.main')

@section('container')
    <section>
        <!-- ======= Create Inventory Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Create Barang Keluar</h1>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <form action="{{ route('store-keluar') }}" method="post" class="php-email-form">
                                @csrf
                                <div class="form-group mt-3 mb-3">
                                    <label for="nama_barang">Nama Customer</label>
                                    <input type="text" name="nama_customer" class="form-control" id="nama_customer"
                                        placeholder="Masukkan nama customer" required>
                                </div>
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
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                                        placeholder="0" min="0" step="1000" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="tanggal_beli">Tanggal Beli</label>
                                    <input type="number" class="form-control" name="tanggal_beli" id="tanggal_beli"
                                        placeholder="0" min="0" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="jumlah_terjual">Jumlah Terjual</label>
                                    <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                                        placeholder="0" min="0" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </section>
@endsection
