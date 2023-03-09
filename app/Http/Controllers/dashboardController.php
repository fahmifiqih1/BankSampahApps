<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Transaction;
use App\Trash;
use App\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $transaction = Transaction::all();
        $user = User::all();
        $trash = Trash::all();
        $collector = Collector::all();
        return view('admin.dashboard', compact(['user', 'trash', 'collector','transaction']));
    }
}
