@extends('layouts.main')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Detail Barang Keluar</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="php-email-form">
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Customer</label>
                                <input type="text" class="form-control" name="nama_customer" id="nama_customer"
                                    value="{{ $barangkeluar->nama_customer }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="{{ $barangkeluar->nama_barang }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                                    value="{{ $barangkeluar->harga_jual }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="tanggal_beli">Tanggal Beli</label>
                                <input type="date" class="form-control" name="tanggal_beli" id="tanggal_beli"
                                    value="{{ $barangkeluar->tanggal_beli }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah_terjual">Jumlah Terjual</label>
                                <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                                    value="{{ $barangkeluar->jumlah_terjual }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Penjualan (Invoice)</label>
                                @if ($barangkeluar->original_filename)
                                    <h5>{{ $barangkeluar->original_filename }}</h5>
                                    <a href="{{ route('barangkeluar.downloadFile', ['barangkeluarId' => $barangkeluar->id]) }}" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download Invoice
                                    </a>
                                @else
                                    <h5>Tidak ada</h5>
                                @endif
                            </div>
                            <div class="form-group">
                                {{-- <a href="{{ route('edit-keluar', ['id' => $barangkeluar->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('delete-keluar', ['id' => $barangkeluar->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
