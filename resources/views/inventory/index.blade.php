@extends('layouts.main')

@section('container')

@push('scripts')
    <script type="module">
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
        });
    </script>
@endpush


    <section id="inventory" class="inventory">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Inventory</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-3 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="table-responsive">
                        <table id="InventoryTable" class="table table-striped table-bordered datatable">
                            <thead class="thead-dark">
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

                                            <div class="d-flex">
                                                <form action="{{ route('inventory.destroy', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete btn btn-danger" data-name="{{ $item->nama_barang}}">
                                                        <i class="bi-trash3-fill"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ route('inventory.edit', ['id' => $item->id]) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
