<table>
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
