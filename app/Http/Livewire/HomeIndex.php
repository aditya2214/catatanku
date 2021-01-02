<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
use PDF;
class HomeIndex extends Component
{
    use WithPagination;

    public $order=false;
    public $initial_parameter;
    public $final_parameter;
    public $filter=5;
    public $statusUpdate=false;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'StorePesanan'=>'GetStorePesanan',
        'updatedSuccess'=>'getUpdatedPemesan',
        'cencelUpdate'=>'render',
        'storDetailOrder'=>'handaleDetail'
    ];

    public function render()
    {
        return view('livewire.home-index',[
            // 'pemesans' => \App\Pemesan::where('nama_pemesan','like','%'.$this->search.'%')->orWhere('alamat_pemesan','like','%'.$this->search.'%')->orWhere('no_hp_pemesan','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate($this->filter),
            //'pemesans' =>//
            'pemesans' => DB::table('pemesans')
            // ->leftjoin('cicilan', 'pemesans.id', '=', 'cicilan.id_pemesan')
            ->select('pemesans.id','pemesans.nama_pemesan',
            'pemesans.alamat_pemesan',
            'pemesans.no_hp_pemesan',
            'pemesans.created_at')
            ->where('pemesans.nama_pemesan','like','%'.$this->search.'%')
            ->orWhere('pemesans.alamat_pemesan','like','%'.$this->search.'%')
            ->orWhere('pemesans.no_hp_pemesan','like','%'.$this->search.'%')
            ->orderBy('pemesans.created_at','DESC')
            ->paginate($this->filter)
        ]);
    }

    public function GetStorePesanan($store_pesanan){
    }

    public function destroy($id){
        \App\Pemesan::where('id',$id)->delete();

        session()->flash('message', 'kontak berhasil di hapus');   

    }

    public function getPemesan($id){

        $this->statusUpdate=true;

        $getpemesan = \App\Pemesan::find($id);

        $this->emit('getPemesanEdit',$getpemesan);
    }

    public function getUpdatedPemesan($updatepemesan){

        $this->statusUpdate=false;    
    }

    public function order($id){
        $this->order=true;

        $this->emit('orderindex',$id);
    }

    public function back(){
        $this->order=false;
    }

    public function handaleDetail(){
        $this->order=false;
    }

    public function detail($id){
        $this->emit('getDetail',$id);
    }

}
