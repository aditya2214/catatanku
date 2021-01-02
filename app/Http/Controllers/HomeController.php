<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;  
use DB;  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0) {
            return view ('tamu');
        }else{
            return view('home');
        }
    }

    public function print(Request $reqest){
        $i = $reqest->initial_prameter;
        $f = $reqest->final_parameter;

        $detail_order = DB::table('pemesans')
        ->join('detail_order', 'pemesans.id', '=', 'detail_order.id_pemesan')
        ->select('pemesans.nama_pemesan','pemesans.no_hp_pemesan',DB::raw('SUM(detail_order.total_belanja) as total'))
        ->groupBy('pemesans.nama_pemesan','pemesans.no_hp_pemesan')
        ->orderBy('total','DESC')
        ->whereBetween('detail_order.created_at', [$i, $f])

        ->get();
        
        // dd($detail_order);

        $pdf = PDF::loadview('report_detail',compact('detail_order'))->setPaper('a4', 'landscape');
        // dd($pdf);
        return $pdf->stream();
    }
}
