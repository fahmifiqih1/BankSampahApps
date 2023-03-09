<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
        $users = DB::table('users')->orderBy('created_at', 'desc')
        ->paginate(2);

        return view('admin.users.index', ['users' => $users]);
    }

    public function search(Request $request){
        $keyword = $request->get('keyword');
        
        $users = DB::table('users')
        ->where('name', 'LIKE', "%".$keyword."%")
        ->paginate();
        return view('admin.users.index', ['users' => $users]);
    }

    public function pdf(){

        $users = DB::table('users')->get();

        $pdf = \PDF::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('data-User.pdf');
    }
}
