$(function() {
    $("#BarangkeluarTable").DataTable({
      serverSide: true,
      processing: true,
      ajax: "{!! route('barangkeluar.getData') !!}",
      columns: [
        { data: "id", name: "id", visible: true },
        { data: "nama_customer", name: "nama_customer" },
        { data: "nama_barang", name: "nama_barang" },
        { data: "harga_jual", name: "harga_jual" },
        { data: "formatted_tanggal_beli", name: "tanggal_beli" },
        { data: "jumlah_terjual", name: "jumlah_terjual" },
        { data: "action", name: "action", orderable: false, searchable: false },
      ],
      order: [[0, "desc"]],
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"],
      ],
    });

    $(".datatable").on("click", ".btn-delete", function (e) {
      e.preventDefault();
      var form = $(this).closest("form");
      var name = $(this).data("name");
      Swal.fire({
        title: "Are you sure want to delete\n" + name + "?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "bg-primary",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
