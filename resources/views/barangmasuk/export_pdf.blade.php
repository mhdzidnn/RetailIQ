<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
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
    <h1>List Data Barang Masuk</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga Awal</th>
                <th>Jumlah Barang Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangmasuk as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>Rp{{ number_format($item->harga_awal, 0, ',', '.') }}</td>
                <td>{{ $item->jumlah}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
