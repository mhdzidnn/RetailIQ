<table>
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
                <td>{{ $item->harga_awal }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
