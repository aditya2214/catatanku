<div>
<!-- <input type="text" wire:model="id_pem"> -->
    <div class="row">
        
        <div class="col-md-4">
            @if($getid)
                <form style="margin:10px;" wire:submit.prevent="UpdateOrder">
                    <input wire:model="id_order" type="hidden">
                    <!-- <div class="form-group">
                        <input wire:model="brand" type="text" placeholder="Brand" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <select wire:model="brand" name="brand" class="form-control">
                        <option selected="1" value="1" >Select</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->nama_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input wire:model="nama_produk" type="text" placeholder="Nama Produk" class="form-control">
                    </div>
                    <div class="form-group">
                        <input wire:model="sub_produk" type="text" placeholder="Sub Produk" class="form-control">
                    </div>
                    <div class="form-group">
                        <select wire:model="ukuran" name="ukuran" class="form-control">
                        <option selected="1" value="1" >Select</option>
                            @foreach($ukurans as $ukuran)
                            <option value="{{$ukuran->id}}">{{$ukuran->nama_ukuran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input wire:model="harga_produk" type="number" placeholder="Harga Produuk" class="form-control">
                            </div>
                            <div class="col">
                                <input wire:model="jumlah_beli" type="number" placeholder="Jumlah Beli" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <input wire:model="ukuran" type="text" placeholder="Ukuran" class="form-control">
                    </div> -->
                    <button class="btn btn-success btn-sm">Simpan</button>
                </form>
                    <button style="position:relative;left:25%;top:-38px;" wire:click="batal" class="btn btn-danger btn-sm">Batal</button>
            @else
                @if($detail_orders == null)
                <form style="margin:10px;" wire:submit.prevent="StoreOrder">
                    <input wire:model="id_pemesan" type="hidden">
                    <!-- <div class="form-group">
                        <input wire:model="brand" type="text" placeholder="Brand" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <select wire:model="brand" name="brand" class="form-control">
                        <option selected="1" value="1" >Select</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->nama_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input wire:model="nama_produk" type="text" placeholder="Nama Produk" class="form-control">
                    </div>
                    <div class="form-group">
                        <input wire:model="sub_produk" type="text" placeholder="Sub Produk" class="form-control">
                    </div>
                    <div class="form-group">
                        <select wire:model="ukuran" name="ukuran" class="form-control">
                        <option selected="1" value="1" >Select</option>
                            @foreach($ukurans as $ukuran)
                            <option value="{{$ukuran->id}}">{{$ukuran->nama_ukuran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input wire:model="harga_produk" type="number" placeholder="Harga Produuk" class="form-control">
                            </div>
                            <div class="col">
                                <input wire:model="jumlah_beli" type="number" placeholder="Jumlah Beli" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <input wire:model="ukuran" type="text" placeholder="Ukuran" class="form-control">
                    </div> -->
                    <button class="btn btn-success btn-sm">Simpan</button>
                </form>
                @else

                @endif
            @endif
        </div>
        
        @if($detail_orders)
        <div class="col-md-4">
        
        </div>
        <div class="col-md-4 ">
            <table class="table table-bordered table-dark text-center">
                <thead>
                    <tr>
                        <th>Rp.{{number_format($detail_orders->total_belanja,2)}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pay as $p)
                    <tr>
                        <td>{{date('d-M-Y', strtotime($p->created_at))}} : Rp.{{number_format($p->nominal,2)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Sisa : Rp.{{number_format($sisa,2)}}</td>
                    </tr>
                </tbody>
            </table>
            @if($sisa == 0)

            @else
            <br>
            <form wire:submit.prevent="Pay">
            <input wire:model="nominal" class="form-control" type="text">
            <br>
            <button style="position:relative; left:80%" class="btn btn-success">Pay</button>
            </form>
            @endif
        </div>
        @else
        @endif
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Brand</th>
                        <th>Nama Produk</th>
                        <th>Sub Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Total Belanja</th>
                        <th>Ukuran</th>
                        @if($detail_orders == null)
                        <th>Aksi</th>
                        @else
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->brand_relation->nama_brand}}</td>
                        <td>{{$order->nama_produk}}</td>
                        <td>{{$order->sub_produk}}</td>
                        <td>{{$order->ukuran_relation->nama_ukuran}}</td>
                        <td>{{$order->harga_produk}}</td>
                        <td>{{$order->jumlah_beli}}</td>
                        <td>{{$order->total_belanja}}</td>
                        @if($detail_orders == null)
                        <td>
                            <button wire:click="getid({{$order->id}})" class="btn btn-warning btn-sm">Edit</button>
                            <button wire:click="getorder({{$order->id}})" class="btn btn-danger btn-sm">Delete</button> 
                        </td>
                        @else
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="background-color:black; color:white">
                        <td colspan="6">Total</td>
                        <td colspan="2">{{$total_belanja}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @if($detail_orders == null)
    <div class="row">
        <div class="col-md-12" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-center">    
                            <input wire:model="discount" id="discount" style="width:50%;" type="number" placeholder="Discount" class="form-control">
                        </td>
                        <td>
                            <input readonly value="{{$hasil_discount}}" id="hasil_discount" type="text" style="width:100%;" placeholder="Hasil Discount" class="form-control">
                        </td>
                        <td>
                            <a href="https://rajaongkir.com/m" target="_blank" class="btn btn-success btn-sm" rel="noopener noreferrer">Cek Ongkir</a>
                        </td>
                        <td>
                            <input wire:model="nama_ongkir" type="text" placeholder="Nama Kurir" class="form-control">
                        </td>
                        <td>
                            <input wire:model="ongkir" type="number" style="width:100%;" placeholder="Ongkir" class="form-control">
                        </td>
                        <td>
                            <input readonly value="{{$hasil_discongkir}}" type="text" style="width:100%;" placeholder="Total Akhir" class="form-control">
                        </td>
                        <td colspan="2" class="text-center">
                            <button wire:click="StoreDetailOrder({{$id_pemesan}})" class="btn btn-success btn-sm">Simpan</button>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>{{$total_belanja}}</td>
                        <td class="text-center"> - </td>
                        <td> {{$detail_orders->discount}}% </td>
                        <td class="text-center"> + </td>
                        <td>{{$detail_orders->ongkir}}</td>
                        <td class="text-center"> = </td>
                        <td>{{$detail_orders->total_belanja}}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
     @endif
</div>
