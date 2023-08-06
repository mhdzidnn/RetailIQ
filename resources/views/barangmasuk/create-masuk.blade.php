<!-- resources/views/barangmasuk/create-masuk.blade.php -->

@extends('layouts.main')

@section('container')
    <section id="contact" class="contact mt-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h1>Create Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form action="{{ route('store') }}" method="post" class="php-email-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <select class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" id="nama_barang" required>
                                    <option disabled selected>-- Pilih Barang --</option>
                                    <option value="Rolex GMT-Master II">Jam Tangan Rolex GMT-Master II</option>
                                    <option value="Rolex Day-Date">Jam Tangan Rolex Day-Date (Presidential)</option>
                                    <option value="Rolex Yacht-Master">Jam Tangan Rolex Yacht-Master</option>
                                    <option value="Casio Baby-G">Jam Tangan Casio Baby-G</option>
                                    <option value="Casio Classic">Jam Tangan Casio Classic</option>
                                    <option value="Tissot PRC 200">Jam Tangan Tissot PRC 200</option>
                                </select>
                                @error('nama_barang')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="harga_awal">Harga Awal</label>
                                <input type="number" class="form-control" name="harga_awal" value="{{ old('harga_awal') }}" id="harga_awal"
                                    placeholder="0" min="0" required>
                                @error('harga_awal')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                                <input type="number" class="form-control" name="jumlah" value="{{ old('jumlah') }}" id="jumlah"
                                    placeholder="0" min="0" required>
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="invoice" class="form-label">Nota Pembelian (Invoice)</label>
                                <input type="file" class="form-control" name="Invoice" value="{{ old('Invoice') }}" id="Invoice" required>
                                @error('invoice')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <a href="{{ route('barangmasuk') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
