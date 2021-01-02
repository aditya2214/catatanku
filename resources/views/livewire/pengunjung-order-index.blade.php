<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Nama Produk</th>
                <th>Sub Produk</th>
                <TH>Ukuran</TH>
                <th>Harga Produk</th>
                <th>Jumlah Beli</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->brand_relation->nama_brand}}</td>
                <td>{{$order->nama_produk}}</td>
                <td>{{$order->sub_produk}}</td>
                <td>{{$order->ukuran_relation->nama_ukuran}}</td>
                <td>Rp.{{number_format($order->harga_produk)}}</td>
                <td>{{$order->jumlah_beli}}</td>     
                <td>Rp.{{number_format($order->total_belanja)}}</td>     
          </tr>
            @endforeach
        </tbody>
        @if($detail_orders == null)

        @else
        <tfoot>
            <tr>
            <th>HARGA ASLI : Rp.{{number_format($total_belanja)}}</th>
            <th class="text-center"> - </th>
            <th>DISCOUNT : {{$detail_orders->discount}}% </th>
            <th class="text-center"> + </th>
            <th>ONGKIR : Rp.{{number_format($detail_orders->ongkir)}}</th>
            <th class="text-center"> = </th>
            <th>GRAND TOTAL : {{number_format($detail_orders->total_belanja)}}</th>
            </tr>
        </tfoot>
        @endif
    </table>
    <table class="table table-bordered">
        <tbody>
            @foreach($pay as $p)
                <td>Pembayaran</td> 
                <td>Rp.{{number_format($p->nominal)}} : {{date('d-M-Y', strtotime($p->created_at))}}</td>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Sisa : {{$sisa}}</th>
            </tr>
        </tfoot>
    </table>
</div>
