<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdatePemesan extends Component
{
    public $nama_pemesan;
    public $alamat_pemesan;
    public $no_hp_pemesan;
    public $id_pemesan;

    protected $listeners = [
        'getPemesanEdit' => 'showPemesan'
    ];

    public function render()
    {
        return view('livewire.update-pemesan');
    }

    public function showPemesan($getpemesan){
        $this->nama_pemesan = $getpemesan['nama_pemesan'];
        $this->alamat_pemesan = $getpemesan['alamat_pemesan'];
        $this->no_hp_pemesan = $getpemesan['no_hp_pemesan'];
        $this->id_pemesan = $getpemesan['id'];
    }

    public function UpdatePesanan(){
        $this->validate([
            'nama_pemesan'=> 'required|min:3',
            'alamat_pemesan'=> 'required|max:255',
            'no_hp_pemesan'=> 'required|max:15'
        ]);
        
        $updatepemesan = \App\Pemesan::find($this->id_pemesan);
        $updatepemesan->update([
            'nama_pemesan'=>$this->nama_pemesan,
            'alamat_pemesan'=>$this->alamat_pemesan,
            'no_hp_pemesan'=>$this->no_hp_pemesan
        ]);

        
        $this->resetInputUpdate();
        
        $this->emit('updatedSuccess',$updatepemesan);
    }

    public function resetInputUpdate(){
        $this->nama_pemesan=null;
        $this->alamat_pemesan=null;
        $this->no_hp_pemesan=null;
    }
}
