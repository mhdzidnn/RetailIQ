<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>EExport PDF</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Customer</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Tanggal Beli</th>
                <th>Jumlah Barang Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangkeluar as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_customer }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $item->tanggal_beli }}</td>
                    <td>{{ $item->jumlah_terjual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



