@extends('layouts.main')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Detail Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="php-email-form">
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="{{ $barangmasuk->nama_barang }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" id="harga_awal"
                                    value="{{ $barangmasuk->harga_awal }}" readonly>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah"
                                    value="{{ $barangmasuk->jumlah }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                @if ($barangmasuk->original_filename)
                                    <h5>{{ $barangmasuk->original_filename }}</h5>
                                    <a href="{{ route('barangmasuk.downloadFile', ['barangmasukId' => $barangmasuk->id]) }}" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download Invoice
                                    </a>
                                @else
                                    <h5>Tidak ada</h5>
                                @endif
                            </div>
                            <div class="form-group">
                                {{-- <a href="{{ route('edit', ['id' => $barangmasuk->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('delete', ['id' => $barangmasuk->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
