<div>
    <div class="row">
        <div class="col-md-4">
            <input wire:model="no_hp" class="form-control" type="number" placeholder="masukan nomor hp anda tanpa pemisah">
            <br>
        </div>
        <div class="col-md-12" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pemesan</th>
                        <th>No HP Pemesan</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesans as $pemesan)
                    <tr>
                        <td>{{$pemesan->nama_pemesan}}</td>
                        <td>{{$pemesan->alamat_pemesan}}</td>
                        <td>{{$pemesan->no_hp_pemesan}}</td>
                        <td>{{date('d-M-Y', strtotime($pemesan->created_at))}}</td>
                        <td>
                            <button wire:click="lihat_pesanan({{$pemesan->id}})" class="btn btn-primary btn-sm text-center">Lihat Pesanan</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12" style="overflow-x:auto;">
            <livewire:pengunjung-order-index></livewire:pengunjung-order-index>
        </div>
    </div>
</div>
