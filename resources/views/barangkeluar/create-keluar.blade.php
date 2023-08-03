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
                            <form action="{{ route('store-keluar') }}" method="post" enctype="multipart/form-data" class="php-email-form">
                                @csrf
                                <div class="form-group mt-3 mb-3">
                                    <label for="nama_customer">Nama Customer</label>
                                    <input type="text" name="nama_customer" value="{{ old('nama_customer') }}" class="form-control @error('nama_customer') is-invalid @enderror" id="nama_customer"
                                        placeholder="Masukkan nama customer" required>
                                    @error('nama_customer')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="nama_barang">Nama Barang</label>
                                    <select class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" required>
                                        <option disabled selected>-- Pilih Kategori --</option>
                                        <option value="Air Galon Aqua">Air Galon Aqua</option>
                                        <option value="Air Galon Sanford">Air Galon Sanford</option>
                                        <option value="Air Galon Mindy">Air Galon Mindy</option>
                                    </select>
                                    @error('nama_barang')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ old('harga_jual') }}" id="harga_jual"
                                        placeholder="0" min="0" required>
                                    @error('harga_jual')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="tanggal_beli">Tanggal Beli</label>
                                    <input type="date" class="form-control @error('tanggal_beli') is-invalid @enderror" name="tanggal_beli" value="{{ old('tanggal_beli') }}" id="tanggal_beli"
                                        placeholder="yy/mm/dd" pattern="\d{4}/\d{2}/\d{2}" required>
                                    @error('tanggal_beli')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="jumlah_terjual">Jumlah Terjual</label>
                                    <input type="number" class="form-control @error('jumlah_terjual') is-invalid @enderror" name="jumlah_terjual" value="{{ old('jumlah_terjual') }}" id="jumlah_terjual"
                                        placeholder="0" min="0" required>
                                    @error('jumlah_terjual')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Invoice" class="form-label">Nota Penjualan(Invoice)</label>
                                    <input type="file" class="form-control" name="Invoice" id="Invoice" value="{{ old('Invoice') }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                    <a href="{{ route('barangkeluar') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </section>
@endsection
