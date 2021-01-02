<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StorePesanan extends Component
{
    public $nama_pemesan;
    public $alamat_pemesan;
    public $no_hp_pemesan;

    public function render()
    {
        return view('livewire.store-pesanan');
    }

    public function StorePesanan(){
        $this->validate([
            'nama_pemesan'=> 'required|min:3',
            'alamat_pemesan'=> 'required|max:255',
            'no_hp_pemesan'=> 'required|max:15'
        ]);

        $store_pesanan = \App\Pemesan::create([
            'nama_pemesan'=>$this->nama_pemesan,
            'alamat_pemesan'=>$this->alamat_pemesan,
            'no_hp_pemesan'=>$this->no_hp_pemesan
        ]);

        
        $this->resetInputPesanan();

        $this->emit('StorePesanan',$store_pesanan);
    }

    public function resetInputPesanan(){
        $this->nama_pemesan = null;
        $this->alamat_pemesan = null;
        $this->no_hp_pemesan = null;
    }
}
