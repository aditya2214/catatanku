<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderIndex extends Component
{
    public $id_pemesan;
    public $brand;
    public $nama_produk;
    public $sub_produk;
    public $harga_produk;
    public $jumlah_beli;
    public $ukuran;
    public $id_order;
    public $discount=0;
    public $nama_ongkir;
    public $ongkir;
    public $getid = false;
    public $order = true;
    public $nominal;
    // public $id_pem;

    protected $listeners = [
        'orderindex' => 'show'
    ];

    
    
    public function render()
    {
        // dd(\App\Order::where('id_pemesan',$this->id_pemesan)->get());
        // dd(\App\DetailOrder::where('id_pemesan',$this->id_pemesan)->first());
        return view('livewire.order-index',[
            // dd($this->id_pemesan),
            'orders'=> \App\Order::where('id_pemesan',$this->id_pemesan)->get(),
            'total_belanja'=> \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja'),
            'brands'=> \App\Brand::all(),
            'ukurans'=> \App\Ukuran::all(),
            'hasil_discount' => \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - ($this->discount * \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') / 100),
            'hasil_discongkir' => \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - ($this->discount * \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') / 100) + $this->ongkir,
            'detail_orders' => \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->first(),
            'pay'=>\App\Pay::where('id_pemesan',$this->id_pemesan)->get(),
            'sisa'=> \App\DetailOrder::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - \App\Pay::where('id_pemesan',$this->id_pemesan)->sum('nominal')
        ]);
    }

    public function Pay(){

        $storePay = \App\Pay::create([
            'id_pemesan'=>$this->id_pemesan,
            'nominal'=>$this->nominal
        ]);

        $this->nominal = null;
    }
    
    public function show($id){
        // dd($id);
      $this->id_pemesan = $id;
    }

    public function StoreOrder(){

        $store_order = \App\Order::create([
            'id_pemesan'=>$this->id_pemesan,
            'brand'=>$this->brand,
            'nama_produk'=>$this->nama_produk,
            'sub_produk'=>$this->sub_produk,
            'harga_produk'=>$this->harga_produk,
            'jumlah_beli'=>$this->jumlah_beli,
            'total_belanja'=>$this->harga_produk * $this->jumlah_beli,
            'ukuran'=>$this->ukuran
        ]);

        $this->resetForm();
    }

    public function resetForm(){
    $this->brand=null;
     $this->nama_produk=null;
     $this->sub_produk=null;
     $this->harga_produk=null;
     $this->jumlah_beli=null;
     $this->ukuran=null;
    }

    public function getorder($id){

        // dd($ids);
        \App\Order::where('id',$id)->delete();
    }

    public function getid($id){
        $this->getid = true;
        $getid = \App\Order::find($id);
        $this->id_order = $getid['id'];
        $this->brand=$getid['brand'];
        $this->nama_produk=$getid['nama_produk'];
        $this->sub_produk=$getid['sub_produk'];
        $this->harga_produk=$getid['harga_produk'];
        $this->jumlah_beli=$getid['jumlah_beli'];
        $this->ukuran=$getid['ukuran'];
    }

    public function UpdateOrder(){
        $getid = \App\Order::find($this->id_order);
        // dd($getid);
        $getid->update([
            'brand'=>$this->brand,
            'nama_produk'=>$this->nama_produk,
            'sub_produk'=>$this->sub_produk,
            'harga_produk'=>$this->harga_produk,
            'jumlah_beli'=>$this->jumlah_beli,
            'total_belanja'=>$this->harga_produk * $this->jumlah_beli,
            'ukuran'=>$this->ukuran
        ]);

        $this->resetForm();
        $this->getid = false;
    }

    public function batal(){
        $this->getid = false;

        $this->resetForm();
    }

    public function StoreDetailOrder($id){
        // $this->id_pemesan =  $this->id_pemesan;
        $store_detail_order = \App\DetailOrder::create([
            'id_pemesan'=>$id,
            'discount'=>$this->discount,
            'nama_kurir'=>$this->nama_ongkir,
            'ongkir'=>$this->ongkir,
            'total_belanja'=>\App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') - ($this->discount * \App\Order::where('id_pemesan',$this->id_pemesan)->sum('total_belanja') / 100) + $this->ongkir
        ]);

        // $this->id_pemesan = $id;
        $this->emit('storDetailOrder',$store_detail_order);
    }
}
