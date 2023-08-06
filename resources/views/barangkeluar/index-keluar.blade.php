@extends('layouts.main')

@section('container')

    <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title mt-5">
                    <h1>Barang Keluar</h1>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="php-email-form">
                            <div class="create mb-3">
                                <a href="{{ route('create-keluar') }}" class="btn-create"><i class="bi bi-plus-square"></i>
                                    Input Barang Keluar
                                </a>
                                <a href="{{ route('barangkeluar.exportExcel') }}" class="btn btn-outline-success">
                                    <i class="bi bi-download me-1"></i> to Excel
                                </a>
                                <li class="list-inline-item">
                                <a href="{{ route('barangkeluar.exportPdf') }}" class="btn btn-outline-danger">
                                    <i class="bi bi-download me-1"></i> to PDF
                                </a>
                            </li>
                            </div>
                            <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up"
                                data-aos-delay="200">
                                <table id="BarangkeluarTable" class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 100px;">ID</th>
                                            <th scope="col" style="width: 250px;">Nama Customer</th>
                                            <th scope="col" style="width: 250px;">Nama Barang</th>
                                            <th scope="col" style="width: 250px;">Harga Jual</th>
                                            <th scope="col" style="width: 250px;">Tanggal Beli</th>
                                            <th scope="col" style="width: 250px;">Jumlah</th>
                                            <th scope="col" style="width: 250px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($barangkeluar as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{$item->nama_customer}}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                                <td>{{ $item->tanggal_beli }}</td>
                                                <td>{{ $item->jumlah_terjual }}</td>
                                                <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('barangkeluar.destroy', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn-delete btn-sm" data-name="{{ $item->nama_customer}}">
                                                            <i class="bi-trash"></i>
                                                        </button>
                                                        <a href="{{ route('show-keluar', ['id' => $item->id]) }}" class="btn btn-warning ">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                                    {{-- <button class="btn btn-danger btn-sm hapus" data-toggle="modal"
                                                        data-target="#ModalDelete" data-id='#'><i
                                                            class="fas fa-trash"></i></button> --}}
                                                {{-- </td> --}} --}}
                                                {{-- <!-- Modal -->
                                                <div class="modal fade" id="ModalDelete" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('delete-inventory', ['id' => $item->id]) }}"
                                                                method="post" id="konfirmasiHapus">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin akan menghapus data ini?
                                                                </div>
                                                                <input type="text" name="id_hapus"
                                                                    class="form-control d-none" id="hapus">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            {{-- </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script>
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
        $('#BarangkeluarTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('barangkeluar.getData') !!}',
            columns: [
                { data: 'id', name: 'id', visible: true },
                // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_customer', name: 'nama_customer' },
                { data: 'nama_barang', name: 'nama_barang' },
                { data: 'harga_jual', name: 'harga_jual' },
                { data: 'formatted_tanggal_beli', name: 'tanggal_beli' },
                { data: 'jumlah_terjual', name: 'jumlah_terjual' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'desc']],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });
    });
</script> --}}
