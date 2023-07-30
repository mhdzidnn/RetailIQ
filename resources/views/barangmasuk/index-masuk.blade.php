
@extends('layouts.main')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h1>Barang Masuk</h1>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="php-email-form">
                        <div class="create mb-3">
                            <a href="{{ route('create') }}" class="btn-create"><i class="bi bi-plus-square"></i>
                                Input Barang Masuk</a>

                            <a href="{{ route('barangmasuk.exportExcel') }}" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                            <a href="{{ route('barangmasuk.exportPdf') }}" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>

                        </div>
                        <div class="col-lg-12 mt-lg-0 d-flex align-items-stretch mx-auto" data-aos="fade-up" data-aos-delay="200">
                            <table id="BarangmasukTable" class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px;">ID</th>
                                        <th scope="col" style="width: 400px;">Nama Barang</th>
                                        <th scope="col" style="width: 400px;">Harga Awal</th>
                                        <th scope="col" style="width: 400px;">Jumlah</th>
                                        <th scope="col" style="width: 400px;">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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

            // Inisialisasi DataTables dengan Server-side Processing
            $('#BarangmasukTable').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{!! route('barangmasuk.getData') !!}',
                columns: [
                    { data: 'id', name: 'id', visible: false },
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'harga_awal', name: 'harga_awal' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                order: [[0, 'desc']],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });
        });
    </script>
@endpush
