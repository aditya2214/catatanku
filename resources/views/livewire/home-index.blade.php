<div>
    @if($order)
        <button wire:click="back" class="btn btn-danger btn-sm">Kembali</button>
        <hr>
        <livewire:order-index></livewire:order-index>
    @else
        <div class="row">
            <div class="col-md-4">
                @if($statusUpdate)
                <livewire:update-pemesan></livewire:update-pemesan>
                @else
                <livewire:store-pesanan></livewire:store-pesanan>
                @endif
            </div>
            <div style="position:fixed;left:82%; top:50%;" class="col-md-5">
                <livewire:details></livewire:details>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <select wire:model="filter" name="" id="" class="form-control form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col">
                <input wire:model="search" class="form-control" placeholder="search" type="text">
            </div>
        </div>
        <br>
        <div style="overflow-x:auto;" class="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama_Pemesan</th>
                        <th>Alamat_Pemesan</th>
                        <th>No_Hp_Pemesan</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesans as $key=>$pemesan)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pemesan->nama_pemesan}}</td>
                        <td>{{$pemesan->alamat_pemesan}}</td>
                        <td>{{$pemesan->no_hp_pemesan}}</td>
                        <th>{{$pemesan->created_at}}</th>
                        <td>
                            <button wire:click="getPemesan({{$pemesan->id}})" class="btn btn-warning btn-sm">Edit</button>
                            <button wire:click="destroy({{$pemesan->id}})" class="btn btn-danger btn-sm">Delete</button>
                            <button wire:click="order({{$pemesan->id}})" class="btn btn-primary btn-sm">Order</button>
                            <button wire:mousemove="detail({{$pemesan->id}})" class="btn btn-success btn-sm">lihat Pemayaran</button>
                        </tr> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pemesans->links() }}
        </div>
    @endif
</div>
