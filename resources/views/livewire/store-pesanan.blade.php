<div>
    <form wire:submit.prevent="StorePesanan">
        <div class="form-group">
            <div class="col">
                <input wire:model="nama_pemesan" type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" placeholder="Nama Pemesan">
                @error('nama_pemesan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <textarea wire:model="alamat_pemesan" type="text" class="form-control @error('alamat_pemesan') is-invalid @enderror" placeholder="Alamat Pemesan" rows="4" cols="50"></textarea>
                @error('alamat_pemesan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <input wire:model="no_hp_pemesan" type="number" class="form-control @error('no_hp_pemesan') is-invalid @enderror" placeholder="No Hp Pemesan">
                @error('no_hp_pemesan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <button class="btn btn-success btn-sm">Simpan</button>
            </div>
        </div>
    </form>
</div>
