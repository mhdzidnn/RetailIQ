@extends('layouts.main')

@section('container')
    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <!-- Tampilkan data inventory di sini -->
                @foreach ($inventory as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="inventory-item">
                            <h3>{{ $item->nama_barang }}</h3>
                            <p>Harga Awal: Rp{{ $item->harga_awal }}</p>
                            <p>Harga Jual: Rp{{ $item->harga_jual }}</p>
                            <p>Stok: {{ $item->stok }}</p>
                            <p>Jumlah Terjual: {{ $item->jumlah_terjual }}</p>
                            <!-- Tambahkan tombol untuk mengedit dan menghapus item inventory -->
                            <div class="actions">
                                <a href="#" class="btn-edit">Edit</a>
                                <form action="#" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
