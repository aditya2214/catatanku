<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PengunjungOrderIndex extends Component
{
    public $id_pemesan;
    protected $listeners = [
        'getPesanan'=>'showPesanan'
    ];

    public function render()
    {
        return view('livewire.pengunjung-order-index',[
            'orders' => \App\Order::where('id_pemesan',$this->id_pemesan)->get(),
            'total_belanja'=> \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja'),
            'detail_orders' => \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->first(),
            'pay'=>\App\Pay::where('id_pemesan',$this->id_pemesan)->get(),
            'sisa'=> \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - \App\Pay::where('id_pemesan',$this->id_pemesan)->sum('nominal')
        ]);
    }

    public function showPesanan($id){
        $this->id_pemesan = $id;
    }
}
