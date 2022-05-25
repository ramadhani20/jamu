<table class="table tablebordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="tabble table-bordered w-100">
                <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>        
                </tr>
                @foreach ($item->details as $detail)
                <tr>
                    <td>{{ $detail->product->nama}}</td>
                    <td>{{ $detail->product->tipe}}</td>
                    <td>{{ $detail->product->harga}}</td>
                </tr>
                @endforeach
            </table>

        </td>
    </tr>
</table>
