<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Trash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->Transaction = new Transaction();
    }
    
    public function index(){

        $transactions = $this->Transaction->allData();
        return view('admin.transaction.index', compact('transactions'));
    }

    
    public function search(Request $request){
        $keyword = $request->get('keyword');
        
        $transactions = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.user_id')
        ->where('name', 'like', '%' .$keyword. '%')
        ->paginate(2);

        return view('admin.transaction.index', ['transactions' => $transactions]);
    }


    public function create(){
        return view('admin.transaction.create');
    }

    public function ceknorek(Request $request){
        $trash = Trash::all();
        $user = User::where('no_rek', $request->no_rek)->first();
        if($user){
            return view('admin.transaction.createrek', compact(['user','trash']));
        }else{
            return redirect('transactions/create')->with('failed', 'NO REK TIDAK ADA!');
        }
    }

    public function store(Request $request, $id){
        $trash = Trash::where('id', $request->trash_id)->first();
        $admin = Auth::guard('admin')->user()->id;
        $user = User::find($id);
        $transaction = new Transaction;
        $transaction->user_id = $id;
        $transaction->admin_id = $admin;
        $transaction->trash_id = $request->trash_id;
        $transaction->jumlah = $request->jumlah;
        $transaction->total_harga = $request->jumlah*$trash->harga_sampah;
        if($user){
            User::where('id', $id)->update([
                'saldo' => $transaction->total_harga+$user->saldo,
            ]);
        }
        $transaction->save();

        Alert::success('Berhasil', 'Sampah Terjual');
        return redirect('/transactions'); 
    }



    
}
