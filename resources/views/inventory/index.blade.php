@extends('layouts.main')

@section('container')
    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-3 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Awal</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Jumlah Terjual</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>Rp{{ number_format($item->harga_awal, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->jumlah_terjual }}</td>
                                    <td>
                                        <form action="{{ route('inventory.destroy', ['id' => $item->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
