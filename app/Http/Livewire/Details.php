<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Details extends Component
{
    public $id_pemesan;
    protected $listeners = [
        'getDetail' => 'showDetail'
    ];

    public function render()
    {
        return view('livewire.details',[
            'detail_orders' => \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->first(),
            'pay'=>\App\Pay::where('id_pemesan',$this->id_pemesan)->get(),
            'sisa'=> \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - \App\Pay::where('id_pemesan',$this->id_pemesan)->sum('nominal')
        ]);
    }

    public function showDetail($id){
        $this->id_pemesan = $id;
    }
}
