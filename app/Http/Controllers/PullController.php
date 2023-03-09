<?php

namespace App\Http\Controllers;

use App\Pull;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PullController extends Controller
{
    public function __construct()
    {
        return $this->Pull = new Pull();
    }

    public function index(){
        $pulls = $this->Pull->allData();
        return view('admin.pulls.index', compact('pulls'));
    }

    
    
    public function create(){
        return view('admin.pulls.create');
    }

    public function ceknorek(Request $request){
        $user = User::where('no_rek', $request->no_rek)->first();
        if($user){
            return view('admin.pulls.createrek', compact('user'));
        }

        return redirect('pulls/create')->with('failed', 'NO REK TIDAK ADA!');
    }

    public function search(Request $request){
        $keyword = $request->get('keyword');
    
        $pulls = DB::table('pulls')
        ->join('users', 'users.id', '=', 'pulls.user_id')
        ->where('name', 'like', '%' .$keyword. '%')
        ->paginate(2);

        return view('admin.pulls.index', ['pulls' => $pulls]);
    }

    public function store(Request $request, $id){
        $user = User::find($id);
        $admin = Auth::guard('admin')->user()->id;
        
        $pull = new Pull;
        $pull->user_id = $id;
        $pull->admin_id = $admin;
        $pull->jumlah = $request->jumlah;
        if($pull->jumlah>$user->saldo){
           return redirect($_SERVER['HTTP_REFERER'].'&alert=kurang_saldo');
        }
            User::where('id', $id)->update([
                'saldo' => $user->saldo - $pull->jumlah,
            ]);
            
        $pull->save();

        Alert::success('Berhasil', 'Menarik Uang');
        return redirect('/pulls');
    }


}
