<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PengunjungIndex extends Component
{
    public $no_hp;

    public function render()
    {
        return view('livewire.pengunjung-index',[
            'pemesans' => \App\Pemesan::where('no_hp_pemesan',$this->no_hp)->orderBy('created_at','DESC')->get(),
        ]);
    }

    public function lihat_pesanan($id){

        $this->emit('getPesanan',$id);
    }
}
