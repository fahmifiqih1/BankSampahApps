<?php

namespace App\Http\Controllers;

use App\collector;
use App\Sell;
use App\Trash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{   

    public function __construct()
    {
        $this->Sell = new Sell();
    }
    
    public function index(){

        $sells = $this->Sell->allData();
        return view('admin.Sells.index', compact('sells'));
    }

    public function search(Request $request){
        $keyword = $request->get('keyword');
    
        $sells = DB::table('sells')
        ->join('collectors', 'collectors.id', '=', 'sells.collector_id')
        ->where('nama_perusahaan', 'like', '%' .$keyword. '%')
        ->paginate(2);

        return view('admin.Sells.index', ['sells' => $sells]);
    }

    public function create(){
        return view('admin.Sells.create');
    }

    public function ceknorek(Request $request){
        $trashes = Trash::all();
        $collector = Collector::where('no_rek', $request->no_rek)->first();
        if($collector){
            return view('admin.Sells.createrek', compact(['collector', 'trashes']));
        }
        
        return redirect('sells/create')->with('failed', 'Norek ga ada!');

    }

    public function store(Request $request, $id){
        $trash = Trash::where('id', $request->trash_id)->first();
        $collector = Collector::find($id);
        $admin = Auth::guard('admin')->user()->id;
        
        $sell = new Sell;
        $sell->trash_id = $request->trash_id;
        $sell->collector_id = $id;
        $sell->admin_id = $admin;
        $sell->jumlah = $request->jumlah;
        $sell->total_harga = $sell->jumlah*$trash->harga_sampah;
        if($collector){
            Trash::where('id', $request->trash_id)->update([
                'jumlah' => $trash->jumlah-$sell->jumlah,
            ]);
        }
        $sell->save();

        Alert::success('Berhasil', 'Sampah Terjual');
        return redirect('/sells');
    }


}
